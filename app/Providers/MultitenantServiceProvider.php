<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Facades\Multitenant;

class MultitenantServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton("Tenant", function ($app) {
            return new Multitenant();
        });
        app("Tenant")->construct();
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
