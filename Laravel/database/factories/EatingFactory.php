<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Eating>
 */
class EatingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'calories_morning' => fake()->numberBetween(0,3600),
            'calories_evening' => fake()->numberBetween(0,3600),
            'calories_noon' => fake()->numberBetween(0,3600),
            'medicine' => fake()->randomElement(['C-vitamin','Nurofen','Algoflex']),
            'amount_of_liquid' => fake()->numberBetween(0,4)
        ];
    }
}
