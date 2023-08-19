<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'event_poster_path'=>fake()->name(),
            'event_name'=> fake()->name(),
            'event_place'=> fake()->realTextBetween(10,20,5),
            'attendee_count'=>fake()->numberBetween(50,500),
            'description'=>fake()->realText(),
            'start_data'=>fake()->dateTime(),
            'end_data'=>fake()->dateTime(),
        ];
    }
}
