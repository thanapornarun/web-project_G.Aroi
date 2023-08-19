<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

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
        $categories = ['Education', 'Music and Festival'];

        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'event_poster_path' => '/images/8084597.jpg',
            'event_name' => fake()->name(),
            'event_place' => fake()->country(),
            'attendee_count' => fake()->numberBetween(5, 20),
            'description' => fake()->sentence(),
            'start_data' => fake()->dateTime(),
            'end_data' => fake()->dateTime(),
            'category' => $this->faker->randomElement($categories),
        ];
    }
}
