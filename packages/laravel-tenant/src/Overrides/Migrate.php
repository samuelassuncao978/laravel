<?php

namespace Laravel\Tenant\Overrides;

use Illuminate\Database\Console\Migrations\MigrateCommand as BaseMigrateCommand;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Database\Migrations\Migrator;
class Migrate extends BaseMigrateCommand
{
    public function __construct(Migrator $migrator, Dispatcher $dispatcher)
    {
        $this->signature .= "{--tenant=}  {--system : Apply migration to system.} {--tenants : Apply migration to tenants.} {--settings : Apply migration to settings.} {--plans : Apply migration to plans.}";
        parent::__construct($migrator, $dispatcher);
    }

    public function handle()
    {
        if ($this->option("system") || (!$this->option("settings") && !$this->option("tenants") && !$this->option("plans") && !$this->option("tenant"))) {
            $this->newLine();
            $this->line("Running migration for: system");
            $this->line("=============================");
            parent::handle();
            $this->newLine();
        }

        if ($this->option("settings")) {
            $this->call("tenant:migrate-settings");
        }

        if ($this->option("plans")) {
            $this->call("tenant:migrate-plans");
        }

        if ($this->option("tenant")) {
            $this->call("tenants:migrate --tenant=" . $this->option("tenant"));
        }

        if ($this->option("tenants")) {
            $this->call("tenants:migrate");
        }
    }

    protected function getMigrationPaths()
    {
        return config("tenants.migration-path");
    }
}
