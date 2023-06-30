<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Response;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton(\Illuminate\Database\Migrations\Migrator::class, function ($app) {
            return $app["migrator"];
        });

        Response::macro("prefered", function ($value) {
            if (request()->expectsJson()) {
            }
            return Response::view($value);
        });
    }
}
