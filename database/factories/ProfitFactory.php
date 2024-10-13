<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profit>
 */
class ProfitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'income' => fake()->randomFloat(4, 10, 700),
            'date' => fake()->date(),
            'total' => fake()->randomFloat(4, 10, 700),
        ];
    }
}
