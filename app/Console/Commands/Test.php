<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

class Test extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = "testcommand";

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Command description";

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // exit();

        foreach (tenants()->all() as $tenant) {
            $tenant->run(function() {
                \App\Models\User::where('email', 'bradley.r.martin@me.com')->first()->regenerateAppointmentAvailableSlots();
            });
        }
    }
}
