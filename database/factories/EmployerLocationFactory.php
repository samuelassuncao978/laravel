<?php

namespace Database\Factories;

use App\Models\EmployerLocation;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class EmployerLocationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = EmployerLocation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition($employerlocation = [])
    {
        return [
            "name" => optional($employerlocation)["name"] ?? $this->faker->company,
            "employer_id" => optional($employerlocation)["employer_id"] ?? null,
        ];
    }
}
