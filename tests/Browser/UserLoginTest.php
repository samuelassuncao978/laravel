<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

use Livewire\Livewire;
use Tests\Browser\TestCase;

// Models
use App\Models\User;

class UserLoginTest extends DuskTestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory(1)
            ->create()
            ->first();
    }

    public function testUserLoginTest()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->visit("/admin/login")
                ->type("email", $this->user->email)
                ->type("password", "password")
                ->press("#Login")
                ->waitForLocation("/admin")
                ->assertPathIs("/admin");
        });
    }
}
