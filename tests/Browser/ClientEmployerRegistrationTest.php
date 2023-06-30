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

class ClientEmployerRegistrationTest extends DuskTestCase
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
            ->make()
            ->first();
    }

    public function testClientEmployerRegistrationTest()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->visit("/portal/login")
                ->type("code", $this->employerlocation->id)
                ->press("#Check")
                ->waitUntilMissing("#Check")
                ->type("first_name", $this->client->first_name)
                ->type("last_name", $this->client->last_name)
                ->type("email", $this->client->email)
                ->select("phone-country", "+64")
                ->type("phone-number", "0413030759")
                ->type("password", "password")
                ->press("#Register")
                ->waitForLocation("/portal")
                ->assertPathIs("/portal");
        });
    }
}
