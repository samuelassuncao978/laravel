<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

use Livewire\Livewire;
use Tests\Browser\TestCase;

// Models
use App\Models\Client;
use App\Models\Employer;
use App\Models\EmployerLocation;

class ClientEmployerLoginTest extends DuskTestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->employer = Employer::factory(1)
            ->create()
            ->first();
        $this->employerlocation = EmployerLocation::factory(1)
            ->create(["employer_id" => $this->employer])
            ->first();
        $this->client = Client::factory(1)
            ->create()
            ->first();
        $this->client->employers()->sync($this->employer->id);
        $this->client->locations()->sync($this->employerlocation->id);
    }

    public function testClientEmployerLoginTest()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->visit("/portal/login")

                ->type("email", $this->client->email)
                ->type("password", "password")
                ->press("#Login")
                ->waitForLocation("/portal")
                ->assertPathIs("/portal");
        });
    }
}
