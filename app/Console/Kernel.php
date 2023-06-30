<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

use App\Jobs\Billing\Calculate;
use App\Jobs\Calendar\CheckWatchingExpiration;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->job(new Calculate())->daily();
        $schedule->job(new CheckWatchingExpiration())->twiceDaily(1, 13);
        
        $schedule->command('calendar:check')->everyFiveMinutes();
        $schedule->command('calendar:sync')->twiceDaily(3, 15);

        // $schedule->command('inspire')->hourly();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . "/Commands");

        require base_path("routes/console.php");
    }
}
