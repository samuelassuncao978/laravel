<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition($user = [])
    {
        return [
            "first_name" => optional($user)["first_name"] ?? $this->faker->firstName,
            "last_name" => optional($user)["last_name"] ?? $this->faker->lastName,
            "email" => optional($user)["email"] ?? $this->faker->unique()->safeEmail,
            "email_verified_at" => optional($user)["email_verified_at"] ?? now(),
            "password" => optional($user)["password"] ?? '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            "remember_token" => optional($user)["remember_token"] ?? Str::random(10),
            "notification_sounds" => optional($user)["notification_sounds"] ?? $this->faker->randomElement([true, false]),
            "notification_summaries" => optional($user)["notification_summaries"] ?? $this->faker->randomElement([true, false]),
            "messenger_client_can_initiate" => optional($user)["messenger_client_can_initiate"] ?? $this->faker->randomElement([true, false]),
            "messenger_sounds" => optional($user)["messenger_sounds"] ?? $this->faker->randomElement([true, false]),
            "messenger_summaries" => optional($user)["messenger_summaries"] ?? $this->faker->randomElement([true, false]),
            "invisible" => optional($user)["invisible"] ?? false,
        ];
    }
}
