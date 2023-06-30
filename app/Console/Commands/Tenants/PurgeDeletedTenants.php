<?php

namespace App\Console\Commands\Tenants;

use Carbon\Carbon;
use Illuminate\Console\Command;

use App\Models\System\Tenant;

class PurgeDeletedTenants extends Command
{
    protected $signature = "tenants:purge";
    protected $description = "Purge deleted tenants";

    public function handle()
    {
        $tenants = Tenant::obsolete()->get();
        if (count($tenants) > 0) {
            $removed = [];
            foreach ($tenants as $tenant) {
                $removed[] = [$tenant->domain];
            }
            $this->table(["tenants"], $removed);
            $this->info("The above tenants were purged.");
        } else {
            $this->info("No tenants are due for purging.");
        }
    }
}
