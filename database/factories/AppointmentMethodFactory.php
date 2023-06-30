<?php

namespace Database\Factories;

use App\Models\AppointmentMethod;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AppointmentMethodFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AppointmentMethod::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition($method = [])
    {
        $icons = array_diff(scandir(resource_path("icons/solid")), array_merge(["..", "."]));
        return [
            "name" => optional($method)["name"] ?? $this->faker->word(),
            "icon" => optional($method)["icon"] ?? str_replace(".svg", "", $this->faker->randomElement($icons)),
            "charge" => optional($method)["charge"] ?? 0,
        ];
    }
}
