<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Facades\Timezone;

class TimezoneServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton("Timezone", function ($app) {
            return new Timezone();
        });
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
