<?php

namespace App\Jobs\Calendar\GoogleCalendar;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Calendar;
use App\Services\Google;
use App\Jobs\Calendar\SyncEvent;
use App\Facades\CalendarManager;
use Google\Service\Exception as GoogleServiceException;

class SyncEvents implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $calendar;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Calendar $calendar)
    {
        $this->calendar = $calendar;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        # Get a Google API service
        $apiService = (new Google())->applyAccessToken($this->calendar->getAccessToken())->getApiService();

        try {
            # Events
            $events = $apiService->events->listEvents("primary", [
                "syncToken" => $this->calendar->getSyncToken(),
            ]);

            while (true) {
                # Fetching events
                foreach ($events->getItems() as $event) {
                    # Process the event
                    CalendarManager::processEvent($this->calendar, $event);
                }

                # Getting a nextPageToken param
                $pageToken = $events->getNextPageToken();

                # Getting a syncToken param
                $syncToken = $events->getNextSyncToken();

                # Break if no more pages
                if (!$pageToken) {
                    break;
                }

                # Otherwise, fetch events
                $events = $apiService->events->listEvents("primary", [
                    "syncToken" => $this->calendar->getSyncToken(),
                    "pageToken" => $pageToken,
                ]);
            }

            # Mark the calender as synced
            $this->calendar->synced([
                "sync_token" => $syncToken ?? null,
            ]);
        } catch (GoogleServiceException $e) {
            report($e);

            # This code means the provided sync token is invalid
            if ($e->getCode() === 410) {
                # Reset it
                $this->calendar->resetSyncToken();

                # Clear the calendar
                $this->calendar->events()->forceDelete();

                # Try again
                return $this->handle();
            }

            /**
             * This code means we are not authenticated.
             * Let's imagine, that an access token became expired
             * and refreshing job stopped working properly.
             */
            if ($e->getCode() === 401) {
                # Try to reanimate access
                $this->calendar->refreshAccessToken();

                # Allow time for the access token update and try again
                self::dispatch($this->calendar)->delay(15);
            }
        }
    }
}
