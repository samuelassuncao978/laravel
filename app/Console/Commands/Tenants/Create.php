<?php

namespace App\Console\Commands\Tenants;

use Illuminate\Console\Command;
use App\Models\System\Tenant;
use App\Models\System\Connection;

class Create extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tenants:create {--domain=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates a tenant with a specified domain';

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
        if (! $this->option('domain')) {
            return $this->error('Be kind to provide a domain');
        }

        $tenant = Tenant::create([
            "domain" => $this->option('domain'),
            "customer" => (object) [
                "company_name" => "Nice guy",
                "first_name" => "Sam",
                "last_name" => "Whiskey",
                "email" => "",
                "phone" => (object) [],
            ],
            "database" => (new Connection())->create(),
        ]);

        $tenant->migrate();
        $tenant->seed();
        $tenant->seed("DemoSeeder");

        return Command::SUCCESS;
    }
}
