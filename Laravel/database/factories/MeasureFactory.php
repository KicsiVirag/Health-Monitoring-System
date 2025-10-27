<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Measure>
 */
class MeasureFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "pulse" => fake()->numberBetween(95,162),
            "blood_pressure" => fake()->numberBetween(117,122) . "/" . fake()->numberBetween(77,81)
        ];
    }
}
