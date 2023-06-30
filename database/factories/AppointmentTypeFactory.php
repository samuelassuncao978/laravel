<?php

namespace Database\Factories;

use App\Models\AppointmentType;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AppointmentTypeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AppointmentType::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition($type = [])
    {
        $icons = array_diff(scandir(resource_path("icons/solid")), array_merge(["..", "."]));
        return [
            "name" => optional($type)["name"] ?? $this->faker->word(),
            "icon" => optional($type)["icon"] ?? str_replace(".svg", "", $this->faker->randomElement($icons)),
            "duration" => optional($type)["duration"] ?? 1.0,
            "charge" => optional($type)["charge"] ?? 0,
        ];
    }
}
