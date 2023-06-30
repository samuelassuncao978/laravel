<?php

namespace App\Jobs\Calendar;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Facades\CalendarManager;
use App\Models\Calendar;

class WatchCalendar implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $calendar;

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
        # Start to watch
        $response = CalendarManager::watchCalendar($this->calendar);

        if (null === $response) {
            # Do nothing
            return;
        }

        # Save watching props
        $this->calendar->update($response);
    }
}
