<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sleep>
 */
class SleepFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'sleep_durration' => fake()->time('H:i'),
            'number_of_awaking' => fake()->numberBetween(0,10),
            'sleep_quality' => fake()->randomElement(['Mély alvás','Szendergés','Felszínes','Álomalvás']),
        ];
    }
}
