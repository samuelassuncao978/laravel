<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ClientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Client::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition($client = [])
    {
        return [
            "first_name" => optional($client)["first_name"] ?? $this->faker->firstName,
            "last_name" => optional($client)["last_name"] ?? $this->faker->lastName,
            "preferred_name" => optional($client)["preferred_name"] ?? ($this->faker->boolean() ? $this->faker->firstName : null),
            "email" => optional($client)["email"] ?? $this->faker->unique()->safeEmail,
            "email_verified_at" => optional($client)["email_verified_at"] ?? now(),
            "password" => optional($client)["password"] ?? '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            "remember_token" => optional($client)["remember_token"] ?? Str::random(10),
            "date_of_birth" => optional($client)["date_of_birth"] ?? ($this->faker->boolean() ? $this->faker->date("Y-m-d", now()->sub(10, "years")) : null),
            "sex" => optional($client)["sex"] ?? ($this->faker->boolean() ? $this->faker->randomElement(["male", "female", "intersex"]) : null),
            "pronouns" => optional($client)["pronouns"] ?? ($this->faker->boolean() ? $this->faker->randomElement(["He/Him", "She/Her", "They/Them", "Ze/Hir", "Xe/Xem"]) : null),
            "sexual_orientation" => optional($client)["sexual_orientation"] ?? ($this->faker->boolean() ? $this->faker->randomElement(["Heterosexual", "Homosexual", "Bisexual", "Asexual", "Cupiosexual"]) : null),
            // "address",
            // "phone",
            "timezone" => optional($client)["timezone"] ?? ($this->faker->boolean() ? $this->faker->timezone : null),
        ];
    }
}
