<?php

namespace App\Jobs\Calendar\OutlookCalendar;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Calendar;
use App\Services\MicrosoftGraph;
use Microsoft\Graph\Model;
use App\Facades\CalendarManager;
use Microsoft\Graph\Exception\GraphException;
use GuzzleHttp\Exception\ClientException;

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
        try {
            # Get events
            $eventsRequest = (new MicrosoftGraph)
                ->applyAccessToken($this->calendar->getAccessToken())
                ->createCollectionRequest('GET', '/me/events')
                ->setReturnType(Model\Event::class)
                ->setPageSize(25)
            ;

            while (true) {
                # Break if no more data
                if ($eventsRequest->isEnd()) break;

                # Fetching events
                foreach ($eventsRequest->getPage() as $event) {
                    # Process the event
                    CalendarManager::processEvent($this->calendar, $event);
                }
            }

            # Mark the calender as synced
            $this->calendar->synced();
        } catch (GraphException $e) {
            report($e);
        } catch (ClientException $e) {
            report($e);

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
