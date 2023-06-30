<?php

namespace App\Console\Commands\Calendar;

use Illuminate\Console\Command;
use App\Models\Calendar;
use App\Models\System\Tenant;

class SyncCalendars extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'calendar:sync {tenant?*}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Synchronizes all matching calendars or only one, if it is specified';

    /**
     * Repeat the sync every N hours
     */
    protected $syncEvery = 48;

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
        # Get tenants
        $tenants = $this->getTenants();

        foreach ($tenants as $tenant) {
            $tenant->run(function () {
                /**
                 * Affect desired models (only non trashed will be retrieved)
                 * and sync each one
                 */
                Calendar::query()
                    ->whereNull('synced_at')
                    ->orWhere('synced_at', '<', now()->subHours($this->syncEvery)->setTimezone('UTC'))
                    ->get()
                    ->each->sync();
            });
        }

        return Command::SUCCESS;
    }

    /**
     * Get tenants to handle
     */
    protected function getTenants()
    {
        if ($this->argument('tenant')) {
            return Tenant::find($this->argument('tenant'));
        }

        return Tenant::all();
    }
}
