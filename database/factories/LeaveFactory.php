<?php

namespace Database\Factories;

use App\Models\Leave;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class LeaveFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Leave::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition($leave = [])
    {
        return [
            "description" => optional($leave)["description"] ?? $this->faker->sentence,
            "start_at" => optional($leave)["start_at"] ?? $this->faker->dateTimeBetween("-1 month", "+3 months"),
            "end_at" => optional($leave)["end_at"] ?? $this->faker->dateTimeBetween("+3 month", "+12 months"),
            "approved" => optional($leave)["approved"] ?? $this->faker->randomElement([true, false]),
            "approved_by" => "",
            "type" => "",
        ];
    }
}
