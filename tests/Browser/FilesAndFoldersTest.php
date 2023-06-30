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

class FilesAndFoldersTest extends DuskTestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory(1)
            ->create()
            ->first();
    }

    public function testCreateFolder()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->loginAs($this->user, "admin")
                ->visit("/admin/files")
                ->press("#CreateFolder")
                ->waitFor(".modal")
                ->type("name", "Test Folder")
                ->radio("icon", "academic-cap")
                ->press("#Create")
                ->pause(2000)
                ->screenshot("test")
                ->waitForLocation("/admin/files")
                ->assertPathIs("/admin/files");
        });
    }
}
