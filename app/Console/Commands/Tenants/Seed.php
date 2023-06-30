<?php

namespace App\Console\Commands\Tenants;

// Illuminate
use Illuminate\Console\Command;
use Illuminate\Database\Console\Seeds\SeedCommand;

use App\Models\System\Tenant;

class Seed extends SeedCommand
{
    protected $signature = "tenants:seed {--tenant=} {--database=} {--class=} {class?} {--force}";
    protected $description = "Migrate seeds";

    public function handle()
    {
        $this->input->setOption("database", "tenant");
        if ($this->option("tenant")) {
            if ($tenant = Tenant::find($this->option("tenant"))) {
                $this->seed_tenant($tenant);
            } else {
                $this->error("Unable to find tenant: " . $this->option("tenant"));
            }
        } else {
            foreach (tenants()->all() as $tenant) {
                $this->seed_tenant($tenant);
            }
        }
    }

    protected function seed_tenant($tenant)
    {
        sleep(2); // Make sure new db is ready.
        multitenant()->load($tenant);
        $this->line("Running seed for: " . $tenant->domain);
        $this->line("=============================");
        parent::handle();
        $this->newLine();
        multitenant()->unload();
    }
}
