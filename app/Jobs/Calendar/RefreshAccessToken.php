<?php

namespace App\Jobs\Calendar;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Calendar;
use App\Facades\CalendarManager;

class RefreshAccessToken implements ShouldQueue
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
        CalendarManager::refreshAccessToken($this->calendar);
    }
}
