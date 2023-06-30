<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\System\Tenant;
use App\Models\System\Connection;
use App\Models\System\Database;

class install extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = "install";

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Install";

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
        $tenant = Tenant::create([
            "domain" => "platform.lndo.site",
            "customer" => (object) [
                "company_name" => "Developer Operations (LOCAL)",
                "first_name" => "Brad",
                "last_name" => "Martin",
                "email" => "",
                "phone" => (object) [],
            ],
            "database" => (new Connection())->create(),
        ]);

        $tenant->migrate();
        $tenant->seed();
        $tenant->seed("DemoSeeder");

        return 0;
    }
}
