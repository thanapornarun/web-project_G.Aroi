<?php

namespace Database\Factories;

use App\Models\Event;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class EventRoleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $roles = ['staff', 'treasurer', 'event attendee'];

        return [
            'user_id' => User::inRandomorder()->first()->id,
            'event_id' => Event::inRandomorder()->first()->id,
            'gender' => $this->faker->randomElement($roles),
        ];
    }
}
