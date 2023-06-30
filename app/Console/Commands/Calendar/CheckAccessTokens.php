<?php

namespace App\Console\Commands\Calendar;

use Illuminate\Console\Command;
use App\Models\Calendar;

class CheckAccessTokens extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = "calendar:check";

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Fetches calendars whose tokens are about to become expired";

    /**
     * Number of minutes to expire in
     */
    protected $expiresIn = 15;

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
        foreach (tenants()->all() as $tenant) {
            $tenant->run(function () {
                Calendar::where(
                    "credentials->access_token->expires_at",
                    "<",
                    now()
                        ->addMinutes($this->expiresIn)
                        ->setTimezone("UTC")
                )
                    ->get()
                    ->each->refreshAccessToken();
            });
        }

        return Command::SUCCESS;
    }
}
