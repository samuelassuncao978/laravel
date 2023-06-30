<?php

namespace App\Services\Calendars;

use App\Models\Calendar;
use App\Models\CalendarEvent;
use Illuminate\Http\Request;

interface CalendarServiceInterface
{
    public function stopWatchingCalendar(Calendar $calendar);
    public function normalizeWatchingResource($resource): array;
    public function watchCalendar(Calendar $calendar): array;
    public function getCalendar(Calendar $calendar): array;
    public function normalizeEvent($remoteEvent): array;
    public function normalizeAuthProperties(array $authProperties, Calendar $calendar = null): array;
    public function handleChangeNotification(Calendar $calendar, Request $request);
    public function syncEvent(CalendarEvent $event);
    public function refreshAccessToken(Calendar $calendar);
    public function getRenderableEvents(Calendar $calendar, array $range);
}
