<?php

namespace Database\Factories;

use App\Models\Profit;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Expense>
 */
class ExpenseFactory extends Factory
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
            'name' => fake()->word(),
            'value' => fake()->randomFloat(4, 10, 700),
            'date' => fake()->date(),
            'profit_id' => fake()->unique()->numberBetween(1, Profit::count()),
        ];
    }
}
