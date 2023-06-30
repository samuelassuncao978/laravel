<?php

return [
    'calendars' => [
        'gmail' => [
            'class' => App\Services\Calendars\GoogleCalendar::class,
            'sync' => [
                'job' => App\Jobs\Calendar\GoogleCalendar\SyncEvents::class,
            ],
        ],
        'outlook' => [
            'class' => App\Services\Calendars\OutlookCalendar::class,
            'sync' => [
                'job' => App\Jobs\Calendar\OutlookCalendar\SyncEvents::class,
            ],
        ],
    ],
];