<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\System\Connection;

class DatabasesList extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = "databases:lists";

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "List databases";

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
        $databases = Connection::get();
        $this->table(["database"], $databases);
        return 0;
    }
}
