<?php

namespace App\Console\Commands\Tenants;

// Illuminate
use Illuminate\Database\Console\Migrations\MigrateCommand;

use App\Models\System\Tenant;

class Migrate extends MigrateCommand
{
    protected $signature = "tenants:migrate {--tenant=} {--database=} {--pretend=} {--step=} {--seed=} {--force} {--schema-path=}";
    protected $description = "Migrate";

    public function handle()
    {
        $this->input->setOption("database", "tenant");
        if ($this->option("tenant")) {
            if ($tenant = Tenant::find($this->option("tenant"))) {
                $this->migrate_tenant($tenant);
            } else {
                $this->error("Unable to find tenant: " . $this->option("tenant"));
            }
        } else {
            foreach (tenants()->all() as $tenant) {
                $this->migrate_tenant($tenant);
            }
        }
    }

    protected function migrate_tenant($tenant)
    {
        sleep(2); // Make sure new db is ready.
        multitenant()->load($tenant);
        $this->line("Running migration for: " . $tenant->domain);
        $this->line("=============================");
        parent::handle();
        $this->newLine();
        multitenant()->unload();
    }

    protected function getMigrationPaths()
    {
        return parent::getMigrationPaths();
    }
}
