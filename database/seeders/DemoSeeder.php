<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

// Models
use App\Models\Role;
use App\Models\User;
use App\Models\Client;
use App\Models\Employer;
use App\Models\EmployerLocation;

class DemoSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->users();
        $this->clients();
        $this->employers();
        $this->employers_locations();

        User::all()->map(function ($user) {
            $user->clients()->attach(
                Client::all()
                    ->pluck("id")
                    ->shuffle()
                    ->slice(0, 15)
                    ->toArray()
            );
            $user->roles()->attach(
                Role::where("name", "!=", "Developer")
                    ->get()
                    ->pluck("id")
                    ->shuffle()
                    ->slice(0, 1)
                    ->toArray()
            );
        });

        Client::all()->map(function ($client) {
            $client->employers()->attach(
                Employer::all()
                    ->pluck("id")
                    ->shuffle()
                    ->slice(0, 1)
                    ->toArray()
            );
        });
    }

    public function users()
    {
        User::factory(30)->create();
    }

    public function clients()
    {
        Client::factory(50)->create();
    }

    public function employers()
    {
        Employer::factory(50)->create();
    }
    public function employers_locations()
    {
        Employer::all()->map(function ($employer) {
            $locations = EmployerLocation::factory(random_int(1, 15))->create([
                "employer_id" => $employer->id,
            ]);
        });
    }
}
