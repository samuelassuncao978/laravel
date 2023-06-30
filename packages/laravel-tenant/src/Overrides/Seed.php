<?php

namespace Laravel\Tenant\Overrides;

use Illuminate\Database\Console\Seeds\SeedCommand as BaseSeedCommand;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Database\ConnectionResolverInterface;

use Laravel\Tenant\Database\Seeders\RootSeeder;

class Seed extends BaseSeedCommand
{
    public function __construct(ConnectionResolverInterface $resolver, Dispatcher $dispatcher)
    {
        $this->signature = "db:seed {--tenants : Apply migration to tenants.} {--database : database.} {--force : Force on production}";
        parent::__construct($resolver, $dispatcher);
    }

    public function handle()
    {
        if ($this->option("tenants")) {
            $this->migrations = [];
            $this->input->setOption("database", "tenant");
            foreach (tenants() as $tenant) {
                multitenant()->load($tenant);
                $this->line("Running seeder for: " . $tenant->domain);
                $this->line("=============================");
                // seeder
                parent::handle();
                $this->newLine();
                multitenant()->unload();
            }
        }
    }

    protected function migrate()
    {
    }

    protected function getSeeder()
    {
        if (!isset(tenant()->id)) {
            return $this->laravel
                ->make(RootSeeder::class)
                ->setContainer($this->laravel)
                ->setCommand($this);
        }
        return $this->laravel
            ->make("Database\\Seeders\\DatabaseSeeder")
            ->setContainer($this->laravel)
            ->setCommand($this);
    }
}
