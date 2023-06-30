<?php

namespace App\Services\Calendars;

use Carbon\Carbon;
use App\Models\Calendar;
use App\Models\CalendarEvent;
use Illuminate\Http\Request;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use InvalidArgumentException;
use Microsoft\Graph\Model;
use App\Services\MicrosoftGraph;
use App\Facades\CalendarManager;
use Microsoft\Graph\Exception\GraphException;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Support\Arr;

class OutlookCalendar implements CalendarServiceInterface
{
    # How long in minutes should a webhook be considered alive (max 4230)
    protected $watchingSubscriptionLifetimeInMinutes = 2880;

    /**
     * Normalize auth token properties
     */
    public function normalizeAuthProperties(array $authProperties, Calendar $calendar = null): array
    {
        if (!isset($authProperties["access_token"])) {
            throw new InvalidArgumentException("Access token has not been provided");
        }

        # Get the moment when access token expires
        $accessTokenExpiresAt = now()
            ->addSeconds($authProperties["expires_in"])
            ->setTimezone("UTC")
            ->toDateTimeString();

        return [
            "access_token" => [
                "token" => $authProperties["access_token"],
                "expires_at" => $accessTokenExpiresAt,
            ],
            "refresh_token" => [
                "token" => $authProperties["refresh_token"] ?? optional($calendar)->getRefreshToken(),
            ],
        ];
    }

    /**
     * Get the specified calendar's properties.
     */
    public function getCalendar(Calendar $calendar): array
    {
        # Get raw
        $remoteCalendar = (new MicrosoftGraph())
            ->applyAccessToken($calendar->getAccessToken())
            ->createRequest("GET", "/me/calendar")
            ->setReturnType(Model\Calendar::class)
            ->execute();

        # Return in common structure
        return [
            "external_id" => $remoteCalendar->getId(),
            "timezone" => null,
        ];
    }

    /**
     * Parse Google's datetime format
     */
    protected function parseDateTime($dateTime)
    {
        if (is_null($dateTime)) {
            return null;
        }

        return Carbon::parse($dateTime->getDateTime())->setTimezone("UTC");
    }

    /**
     * Normalizes a Google Calendar Event Resourse.
     */
    public function normalizeEvent($remoteEvent): array
    {
        # Return a common structure
        return [
            "external_id" => $remoteEvent->getId(),
            "name" => $remoteEvent->getSubject(),
            "start_at" => $this->parseDateTime($remoteEvent->getStart()),
            "end_at" => $this->parseDateTime($remoteEvent->getEnd()),
            "is_recurring" => null !== $remoteEvent->getRecurrence(),
            "recurrence" => $remoteEvent->getRecurrence(),
            "is_busy" => $remoteEvent->getShowAs()->value() !== "free",
        ];
    }

    /**
     * Normalize a watching resource (subscription)
     */
    public function normalizeWatchingResource($resource): array
    {
        return [
            "watching_expires_at" => Carbon::parse($resource["expirationDateTime"])->setTimezone("UTC"),
            "watching_properties" => [
                "resourceId" => $resource["id"],
            ],
        ];
    }

    /**
     * Subscribe to a channel to watch on a calendar.
     */
    public function watchCalendar(Calendar $calendar): array
    {
        # Set a watching
        $response = (new MicrosoftGraph())
            ->applyAccessToken($calendar->getAccessToken())
            ->createRequest("POST", "/subscriptions")
            ->attachBody([
                "changeType" => "created,updated,deleted",
                "notificationUrl" => route("admin.calendar.watching.webhook", $calendar),
                "lifecycleNotificationUrl" => route("admin.calendar.watching.webhook", $calendar),
                "resource" => "/me/events",
                "expirationDateTime" => now()
                    ->addMinutes($this->watchingSubscriptionLifetimeInMinutes)
                    ->toIso8601String(),
            ])
            ->execute();

        # Bring to a common structure
        return $this->normalizeWatchingResource($response->getBody());
    }

    /**
     * Unsubscribe from a channel.
     */
    public function stopWatchingCalendar(Calendar $calendar)
    {
        # If we have nothing to stop
        if (!isset($calendar->watching_properties["resourceId"])) {
            return;
        }

        # Set a watching
        $response = (new MicrosoftGraph())
            ->applyAccessToken($calendar->getAccessToken())
            ->createRequest("DELETE", "/subscriptions/" . $calendar->watching_properties["resourceId"])
            ->execute();
    }

    /**
     * Update or delete an existing event.
     */
    protected function handleNonexistentChangeNotificationResource(Calendar $calendar, array $changeNotification)
    {
        # Get the resource
        $remoteEvent = $this->getRemoteEvent($calendar, $changeNotification["resourceData"]["id"]);

        # And save it
        CalendarManager::saveEvent($calendar, $remoteEvent);
    }

    /**
     * Update or delete an existing event.
     */
    protected function handleExistingChangeNotificationResource(Calendar $calendar, array $changeNotification)
    {
        try {
            # Get the appropriate event
            $event = $calendar
                ->events()
                ->whereExternalId($changeNotification["resourceData"]["id"])
                ->firstOrFail();

            switch ($changeNotification["changeType"]) {
                case "deleted":
                    # Delete the event
                    $event->delete();
                    break;
                case "updated":
                    # Sync the event with its remote copy
                    $event->sync();
                    break;
            }
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            # Sync the event's calendar if a remote copy has an event which we don't have
            $calendar->sync();
        }
    }

    /**
     * Handle a change notification resource.
     */
    protected function handleChangeNotificationResource(Calendar $calendar, array $changeNotification)
    {
        # Handle the appropriate action
        switch ($changeNotification["changeType"]) {
            case "deleted":
            case "updated":
                $this->handleExistingChangeNotificationResource($calendar, $changeNotification);
                break;
            case "created":
                $this->handleNonexistentChangeNotificationResource($calendar, $changeNotification);
                break;
        }

        # Say all is well as requested
        return response("", 200);
    }

    /**
     * Handle lifecycle notification.
     */
    protected function handleLifecycleNotification(Calendar $calendar, $changeNotification)
    {
        // Not so useful for us at the moment
    }

    /**
     * Handle a change notification request.
     */
    public function handleChangeNotification(Calendar $calendar, Request $request)
    {
        # Handle validation request from Microsoft Graph
        if ($request->has("validationToken")) {
            return response($request->input("validationToken"), 200);
        }

        # Retrieve change notifications collection
        $changeNotifications = $request->input("value", []);

        # Loop over each notification
        foreach ($changeNotifications as $changeNotification) {
            # Handle lifecycle notification request
            if (isset($changeNotification["lifecycleEvent"])) {
                $this->handleLifecycleNotification($calendar, $changeNotification);

                continue;
            }

            $this->handleChangeNotificationResource($calendar, $changeNotification);
        }
    }

    /**
     * Get an event's remote copy
     */
    protected function getRemoteEvent(Calendar $calendar, $event)
    {
        if (!is_string($event)) {
            $event = $event->getExternalId();
        }

        return (new MicrosoftGraph())
            ->applyAccessToken($calendar->getAccessToken())
            ->createRequest("GET", "/me/events/" . $event)
            ->setReturnType(Model\Event::class)
            ->execute();
    }

    /**
     * Process an event
     */
    public function processEvent(Calendar $calendar, $remoteEvent)
    {
        CalendarManager::saveEvent($calendar, $remoteEvent);
    }

    /**
     * Sync event with its remote copy
     */
    public function syncEvent(CalendarEvent $event)
    {
        $remoteEvent = $this->getRemoteEvent($event->calendar, $event->getExternalId());

        # Save received remote event resource
        CalendarManager::saveEvent($event->calendar, $remoteEvent);
    }

    /**
     * Check if the access has been revoked
     */
    protected function checkIfAccessRevoked(Calendar $calendar, Response $response)
    {
        if ($response->json()["error"] === "invalid_grant") {
            # Delete the calendar because we can not operate it
            $calendar->delete();

            # Notify a user
            CalendarManager::notifyCalendarSyncGrantRevoked($calendar);
        }
    }

    /**
     * Do the access token refresh
     */
    public function refreshAccessToken(Calendar $calendar)
    {
        $response = Http::asForm()->post(config("services.microsoft_graph.token_url"), [
            "client_id" => config("services.microsoft_graph.client_id"),
            "grant_type" => "refresh_token",
            "scope" => config("services.microsoft_graph.scope"),
            "refresh_token" => $calendar->getRefreshToken(),
            "redirect_uri" => "/admin/calendar/authorize",
            "client_secret" => config("services.microsoft_graph.client_secret"),
        ]);

        if ($response->failed()) {
            # Let's check for revoked access
            $this->checkIfAccessRevoked($calendar, $response);

            return;
        }

        # Normalize auth token props
        $normalizedAuthProperties = $this->normalizeAuthProperties($response->json());

        # Finally set creds
        $calendar->setCredentials($normalizedAuthProperties);
    }

    /**
     * Get a calendar view
     */
    protected function calendarView(Calendar $calendar, array $range)
    {
        return (new MicrosoftGraph())
            ->applyAccessToken($calendar->getAccessToken())
            ->createRequest(
                "GET",
                "/me/calendar/calendarView?" .
                    http_build_query([
                        "startDateTime" => $range[0]->toIso8601String(),
                        "endDateTime" => $range[1]->toIso8601String(),
                        '$select' => "subject,start,end,showAs",
                        '$top' => 1000,
                    ])
            )
            ->setReturnType(Model\Event::class)
            ->execute();
    }

    /**
     * Get renderable events collection
     */
    public function getRenderableEvents(Calendar $calendar, array $range)
    {
        # Convert range dates into Carbon instances
        $range = array_map(fn($date) => Carbon::parse($date), $range);

        try {
            # Request an events collection
            $remoteEvents = $this->calendarView($calendar, $range);

            # Transform the collection into a collection of normalized remote events
            return array_map(function ($remoteEvent) {
                # Normalize the remote event
                $normalizedEvent = $this->normalizeEvent($remoteEvent);

                return new CalendarEvent(Arr::only($normalizedEvent, ["start_at", "end_at", "is_busy", "name"]));
            }, $remoteEvents);
        } catch (GraphException $e) {
            report($e);
        } catch (ClientException $e) {
            report($e);
        }

        return [];
    }
}
