<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Training>
 */
class TrainingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'number_of_steps' => fake()->numberBetween(0,25000),
            'training_intensity' => fake()->randomElement(['Alacsony','Közepes','Intenzív']),
            'training_durration' => fake()->time('H:i'),
            'training_type' => fake()->randomElement(['Futás','Úszás','Túrázás','Falmászás']),
            'training_location' => fake()->randomElement(['Falmászóterem','Uszoda','Futópálya']),
        ];
    }
}
