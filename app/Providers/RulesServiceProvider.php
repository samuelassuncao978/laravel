<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Rules\PhoneRule;
use App\Rules\AddressRule;

class RulesServiceProvider extends ServiceProvider
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
        //
        \Validator::extend("phone", PhoneRule::class);
        \Validator::extend("address", AddressRule::class);
    }
}
