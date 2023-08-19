<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Event;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Budget>
 */
class BudgetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $eventTotal = Event::count();

        return [
            'event_id'=>fake()->numberBetween(1,$eventTotal),
            'budget'=>fake()->numberBetween(200000,500000),
            'balance'=> 0,
        ];
    }
}
