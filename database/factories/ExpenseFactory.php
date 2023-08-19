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
        $budgetTotal = Budget::count();
        return [
            'budget_id'=>fake()->numberBetween(1,$budgetTotal),
            'bill_name'=>fake()->name(),
            'bill_path'=>fake()->name(),
            'description'=>fake()->realText(),
            'amount'=>fake()->numberBetween(20,5000),
            'expense_date'=>fake()->dateTime(),
        ];
    }
}
