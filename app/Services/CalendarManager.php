<?php

namespace App\Services;

use Illuminate\Contracts\Config\Repository;
use Illuminate\Contracts\Foundation\Application;
use InvalidArgumentException;
use App\Models\Calendar;
use App\Models\CalendarEvent;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Notifications\Tenants\CalendarSyncGrantRevoked;

class CalendarManager
{
    protected $app;
    protected $config;

    public function __construct(Application $app)
    {
        $this->app = $app;
        $this->config = $app["config"];
    }

    /**
     * Create recent calendar provider instance.
     */
    public function createCalendarProvider(string $calendarProviderAlias)
    {
        if ($this->config->has("calendar-manager.calendars.$calendarProviderAlias")) {
            # Getting calendar class name
            $class = $this->config->get("calendar-manager.calendars.$calendarProviderAlias.class");

            # Resolve the calendar class instance
            return $this->app->make($class);
        }

        throw new InvalidArgumentException("Calendar provider [$calendarProviderAlias] is not defined");
    }

    /**
     * Let's normalize auth token properties
     */
    public function normalizeAuthProperties(string $calendarProviderAlias, array $authProperties): array
    {
        $provider = $this->createCalendarProvider($calendarProviderAlias);

        return $provider->normalizeAuthProperties($authProperties);
    }

    /**
     * Get remote calendar properties.
     */
    public function getCalendar(Calendar $calendar)
    {
        $provider = $this->createCalendarProvider($calendar->type);

        return $provider->getCalendar($calendar);
    }

    /**
     * Sync events.
     */
    public function syncEvents(Calendar $calendar)
    {
        if ($this->config->has("calendar-manager.calendars.{$calendar->type}")) {
            # Getting calendar's events syncing job class name
            $class = $this->config->get("calendar-manager.calendars.{$calendar->type}.sync.job");

            # Resolve the calendar's events syncing job class instance and dispatch it
            $this->app->make($class)::dispatch($calendar);

            return;
        }

        throw new InvalidArgumentException("Calendar provider [$calendar->type] is not defined");
    }

    /**
     * Normalize an Event Resource.
     *
     * Diffrent calendar providers have differently
     * structured properties of an event resource.
     * We have to normalize that to common data structure.
     */
    public function normalizeEvent(Calendar $calendar, $remoteEvent)
    {
        $provider = $this->createCalendarProvider($calendar->type);

        return $provider->normalizeEvent($remoteEvent);
    }

    /**
     * Process an event
     */
    public function processEvent(Calendar $calendar, $remoteEvent)
    {
        $provider = $this->createCalendarProvider($calendar->type);

        return $provider->processEvent($calendar, $remoteEvent);
    }

    /**
     * Save synced event
     */
    public function saveEvent(Calendar $calendar, $remoteEvent)
    {
        if (null === $remoteEvent) {
            # Do nothing
            return;
        }

        # Get a normalized event resource
        $remoteEvent = $this->normalizeEvent($calendar, $remoteEvent);

        # Create or update an event
        return $calendar->events()->updateOrCreate(["external_id" => $remoteEvent["external_id"]], Arr::except($remoteEvent, ["external_id"]));
    }

    /**
     * Sync event with its remote copy
     */
    public function syncEvent(CalendarEvent $event)
    {
        $provider = $this->createCalendarProvider($event->calendar->type);

        return $provider->syncEvent($event);
    }

    /**
     * Subscribe to a channel to watch on a calendar.
     */
    public function watchCalendar(Calendar $calendar)
    {
        $provider = $this->createCalendarProvider($calendar->type);

        return $provider->watchCalendar($calendar);
    }

    /**
     * Unsubscribe from a channel
     */
    public function stopWatchingCalendar(Calendar $calendar)
    {
        $provider = $this->createCalendarProvider($calendar->type);

        return $provider->stopWatchingCalendar($calendar);
    }

    /**
     * Deal with a change notification
     */
    public function handleChangeNotification(Calendar $calendar, Request $request)
    {
        $provider = $this->createCalendarProvider($calendar->type);

        return $provider->handleChangeNotification($calendar, $request);
    }

    /**
     * Do the access token refresh
     */
    public function refreshAccessToken(Calendar $calendar)
    {
        $provider = $this->createCalendarProvider($calendar->type);

        return $provider->refreshAccessToken($calendar);
    }

    /**
     * Notify calendar users about an access permissions issue
     */
    public function notifyCalendarSyncGrantRevoked(Calendar $calendar)
    {
        foreach ($calendar->users as $user) {
            $user->notify(new CalendarSyncGrantRevoked($calendar));
        }
    }

    /**
     * Get renderable events collection
     */
    public function getRenderableEvents(Calendar $calendar, array $range)
    {
        $provider = $this->createCalendarProvider($calendar->type);

        return $provider->getRenderableEvents($calendar, $range);
    }
}
