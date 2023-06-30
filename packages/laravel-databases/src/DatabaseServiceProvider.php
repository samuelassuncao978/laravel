<?php

namespace Laravel\Databases;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Http\Kernel;
use Illuminate\Routing\Router;

// Commands

use Laravel\Databases\Database\Mysql;

class DatabaseServiceProvider extends ServiceProvider
{
    public function register()
    {
    }

    public function boot(Router $router, Kernel $kernel)
    {
        $this->app->singleton("Mysql", function ($app) {
            return new Mysql();
        });
    }
}
