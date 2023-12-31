<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Budget;

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
            'budget_id' => Budget::inRandomorder()->first()->id,
            'bill_name'=>fake()->name(),
            'bill_path'=>"imagePath/istockphoto-889405434-612x612.jpg",
            'description'=>fake()->realText(),
            'amount'=>fake()->numberBetween(20,5000),
            'expense_date'=>fake()->dateTime(),
        ];
    }
}
