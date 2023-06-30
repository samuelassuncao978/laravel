<?php

namespace App\Services\Calendars;

use Carbon\Carbon;
use App\Services\Google;
use App\Models\Calendar;
use App\Models\CalendarEvent;
use Illuminate\Http\Request;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use Google\Service\Calendar\Channel as Google_Service_Calendar_Channel;
use InvalidArgumentException;
use App\Facades\CalendarManager;
use Google\Service\Exception as GoogleServiceException;
use RRule\RSet;

class GoogleCalendar implements CalendarServiceInterface
{
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
        try {
            # Get raw
            $remoteCalendar = (new Google())
                ->applyAccessToken($calendar->getAccessToken())
                ->getApiService()
                ->calendars->get("primary");

            # Return in common structure
            return [
                "external_id" => $remoteCalendar->getId(),
                "timezone" => $remoteCalendar->getTimeZone(),
            ];
        } catch (GoogleServiceException $e) {
            report($e);
        }
    }

    /**
     * Parse Google's datetime format
     */
    protected function parseDateTime($dateTime)
    {
        if (is_null($dateTime)) {
            return null;
        }

        return Carbon::parse($dateTime->dateTime ?: $dateTime->date)->setTimezone("UTC");
    }

    /**
     * Normalizes a Google Calendar Event Resourse.
     */
    public function normalizeEvent($remoteEvent): array
    {
        # Return a common structure
        return [
            "external_id" => $remoteEvent->getId(),
            "name" => $remoteEvent->getSummary(),
            "start_at" => $this->parseDateTime($remoteEvent->getStart()),
            "end_at" => $this->parseDateTime($remoteEvent->getEnd()),
            "is_recurring" => null !== $remoteEvent->getRecurrence(),
            "recurrence" => $remoteEvent->getRecurrence(),
            "recurring_event_external_id" => $remoteEvent->getRecurringEventId(),
            "is_busy" => $remoteEvent->getTransparency() !== "transparent",
        ];
    }

    /**
     * Let's build a channel for watching on a calendar
     */
    protected function buildChannel(Calendar $calendar): Google_Service_Calendar_Channel
    {
        $channel = (new Google())->getApiChannel();

        $channel->setId($calendar->getKey());
        $channel->setType("web_hook");
        $channel->setAddress(route("admin.calendar.watching.webhook", $calendar));

        return $channel;
    }

    /**
     * Normalize a watching resource (subscription)
     */
    public function normalizeWatchingResource($resource): array
    {
        return [
            "watching_expires_at" => Carbon::createFromTimestampMs($resource["expiration"])->setTimezone("UTC"),
            "watching_properties" => [
                "resourceId" => $resource["resourceId"],
                "resourceUri" => $resource["resourceUri"],
            ],
        ];
    }

    /**
     * Subscribe to a channel to watch on a calendar.
     */
    public function watchCalendar(Calendar $calendar): array
    {
        # Set a channel for watching
        $channel = $this->buildChannel($calendar);

        try {
            # Set a watching
            $resource = (new Google())
                ->applyAccessToken($calendar->getAccessToken())
                ->getApiService()
                ->events->watch("primary", $channel);

            # Bring to a common structure
            return $this->normalizeWatchingResource($resource);
        } catch (GoogleServiceException $e) {
            report($e);
        }
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

        # Build a channel instance
        $channel = (new Google())->getApiChannel();

        # Set params
        $channel->setId($calendar->getKey());
        $channel->setResourceId($calendar->watching_properties["resourceId"]);

        try {
            # Stop watching
            (new Google())
                ->applyAccessToken($calendar->getAccessToken())
                ->getApiService()
                ->channels->stop($channel);
        } catch (GoogleServiceException $e) {
            report($e);
        }
    }

    /**
     * Deal with a change notification
     */
    public function handleChangeNotification(Calendar $calendar, Request $request)
    {
        # Sync
        $calendar->sync();

        # Say all is well as requested
        return response("", 200);
    }

    /**
     * Get an event's remote copy
     */
    protected function getRemoteEvent(Calendar $calendar, $event)
    {
        if (!is_string($event)) {
            $event = $event->getExternalId();
        }

        try {
            return (new Google())
                ->applyAccessToken($calendar->getAccessToken())
                ->getApiService()
                ->events->get("primary", $event);
        } catch (GoogleServiceException $e) {
            report($e);
        }
    }

    /**
     * Process an event
     */
    public function processEvent(Calendar $calendar, $remoteEvent)
    {
        if ($remoteEvent->getStatus() === "cancelled") {
            try {
                # Retrieve the local event
                $calendar
                    ->events()
                    ->whereExternalId($remoteEvent->getId())
                    ->firstOrFail()
                    ->delete();
            } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
                //
            }

            return;
        }

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
        $response = Http::asForm()->post(config("services.google.token_url"), [
            "client_id" => config("services.google.client_id"),
            "client_secret" => config("services.google.client_secret"),
            "grant_type" => "refresh_token",
            "refresh_token" => $calendar->getRefreshToken(),
        ]);

        if ($response->failed()) {
            # Let's check for revoked access
            $this->checkIfAccessRevoked($calendar, $response);

            return;
        }

        # Normalize auth token props
        $normalizedAuthProperties = $this->normalizeAuthProperties($response->json(), $calendar);

        # Finally set creds
        $calendar->setCredentials($normalizedAuthProperties);
    }

    /**
     * Calculate a proper recurring rule's date range
     */
    protected function calculateRecurringRange(CalendarEvent $event, array $range)
    {
        if ($event->start_at->gt($range[0])) {
            $range[0] = $event->start_at;
        }

        return $range;
    }

    /**
     * Retrieve events which are started or ended in the specified date range
     */
    protected function getEventsInRange(Calendar $calendar, array $range)
    {
        $range = [
            $range[0]->startOfDay(),
            $range[1]->endOfDay()
        ];

        return $calendar
            ->events()
            ->where(function ($query) use ($range) {
                return $query
                    # Retreive single (not recurring) events
                    ->where(function($query) use ($range) {
                        return $query
                            ->isRecurring(0)
                            ->where(function($query) use ($range) {
                                return $query
                                    ->whereBetween('start_at', $range)
                                    ->orWhereBetween('end_at', $range)
                                    ->orWhere(function ($query) use ($range) {
                                        return $query
                                            ->where("start_at", "<=", $range[0])
                                            ->where("end_at", ">=", $range[1]);
                                    });
                            });
                    })
                    # Retreive recurring events
                    ->orWhere(function($query) use ($range) {
                        return $query
                            ->isRecurring()
                            ->where('start_at', '<=', $range[1]);
                    })
                ;
            })
            ->get(["id", "name", "start_at", "end_at", "is_busy", "is_recurring", "recurrence"]);
    }

    /**
     * Transform recurrence props into RFC5545 compatible text block
     */
    protected function transformIntoRFC5545TextBlock(array $recurrence)
    {
        $recurrence = implode(PHP_EOL, $recurrence);
        
        return $recurrence;
    }

    /**
     * Generate the event's recurrences
     */
    protected function getEventRecurrences(CalendarEvent $event, array $range)
    {
        # Calculate a proper range
        $range = $this->calculateRecurringRange($event, $range);

        # Transform recurrence props into RFC5545 compatible text block
        $recurrence = $this->transformIntoRFC5545TextBlock($event->recurrence);

        # Build a set of rules based on the event recurrence props
        $rset = new RSet($recurrence, $event->isAllDay() ? $range[0]->toDateString() : $range[0]);

        # Generate constrained recurrences
        return $rset->getOccurrencesBetween($range[0], $range[1]);
    }

    /**
     * Get the recurring event's instances
     */
    protected function getRecurringEventInstances(CalendarEvent $event, array $range)
    {
        # Get recurrences
        $recurrences = $this->getEventRecurrences($event, $range);

        # Get instances
        return array_map(function($recurrence) use ($event) {
            # Set the start datetime
            $startAt = Carbon::instance($recurrence)->setTimeFromTimeString($event->start_at->format('H:i:s'));

            # Set the end datetime by adding the event duration in seconds
            $endAt = $startAt->copy()->addSeconds($event->getDurationInSeconds());

            $properties = array_merge(
                $event->only(['name', 'is_busy']),
                ['start_at' => $startAt, 'end_at' => $endAt]
            );

            return new CalendarEvent($properties);
        }, $recurrences);
    }

    /**
     * Get a renderable events collection
     */
    public function getRenderableEvents(Calendar $calendar, array $range)
    {
        # Convert range dates into Carbon instances
        $range = array_map(fn($date) => Carbon::parse($date), $range);

        # Retrieve events which are started or ended in the specified date range
        $events = $this->getEventsInRange($calendar, $range);

        /**
         * Loop over recurring events and collect recurring instances.
         * Then combine them with single events
         */
        return $events
            ->where('is_recurring', true)
            ->map(function($event) use ($range) {
                # Get recurring instances as an array
                return $this->getRecurringEventInstances($event, $range);
            })
            ->flatten()
            ->concat($events->where('is_recurring', false));
    }
}
