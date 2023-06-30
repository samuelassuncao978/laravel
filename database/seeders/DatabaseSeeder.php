<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

// Models
use App\Models\AppointmentType;
use App\Models\AppointmentMethod;
use App\Models\User;
use App\Models\Role;

class DatabaseSeeder extends Seeder
{
    public $root_user = [
        "first_name" => "Brad",
        "last_name" => "Martin",
        "email" => "bradley.r.martin@me.com",
        "password" => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
    ];

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //
        $this->users();
        $this->roles();
        $this->appointment_types();
        $this->appointment_methods();

        // Methods

        AppointmentType::where("name", "!=", "Supervision")
            ->get()
            ->map(function ($type) {
                $type->appointment_methods()->attach(AppointmentMethod::all());
            });
        AppointmentType::where("name", "Supervision")
            ->get()
            ->map(function ($type) {
                $type->appointment_methods()->attach(AppointmentMethod::where("name", "!=", "Outcall")->get());
            });

        User::all()->map(function ($user) {
            $user->appointment_types()->attach(AppointmentType::all());
            $user->appointment_methods()->attach(AppointmentMethod::all());
        });

        // Apply developer user role.
        User::where("email", $this->root_user["email"])
            ->first()
            ->roles()
            ->sync(Role::where("name", "Developer")->first());
    }

    public function users()
    {
        User::factory(1)->create(
            array_merge($this->root_user, [
                "notification_sounds" => true,
                "notification_summaries" => true,
                "invisible" => true,
            ])
        );
    }

    public function appointment_types()
    {
        AppointmentType::factory(1)->create([
            "name" => "Standard",
            "icon" => "calendar",
            "charge" => 6000,
        ]);
        AppointmentType::factory(1)->create([
            "name" => "Supervision",
            "icon" => "academic-cap",
            "charge" => 12000,
        ]);
    }

    public function appointment_methods()
    {
        AppointmentMethod::factory(1)->create([
            "name" => "Video",
            "icon" => "video-camera",
        ]);
        AppointmentMethod::factory(1)->create([
            "name" => "Telephone",
            "icon" => "phone-incoming",
        ]);
        AppointmentMethod::factory(1)->create([
            "name" => "In-person",
            "icon" => "office-building",
        ]);
        AppointmentMethod::factory(1)->create([
            "name" => "Outcall",
            "icon" => "home",
        ]);
    }

    public function roles()
    {
        Role::factory(1)->create(["name" => "Developer", "invisible" => true]);
        Role::factory(1)->create(["name" => "Administrator"]);
        Role::factory(1)->create(["name" => "Supervisor"]);
        Role::factory(1)->create(["name" => "Counsellor"]);
        Role::factory(1)->create(["name" => "Receptionist"]);
    }
}
