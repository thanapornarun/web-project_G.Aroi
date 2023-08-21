<?php

namespace Database\Factories;

use App\Models\Event;
use App\Models\EventRole;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EventAttendee>
 */
class EventAttendeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $status = ['pass', 'not pass'];

        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'event_id' => Event::inRandomOrder()->first()->id,
            'eventRoles_id' => EventRole::inRandomOrder()->first()->id,
            'status' => $this->faker->randomElement($status),
        ];
    }
}
