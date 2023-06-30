<?php

namespace App\Providers;

use App\Services\CalendarManager;
use Illuminate\Support\ServiceProvider;

class CalendarManagerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(CalendarManager::class, function ($app) {
            return new CalendarManager($app);
        });

        $this->app->alias(CalendarManager::class, 'calendarManager');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
