<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profile>
 */
class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $genders = ['female', 'male', 'not specified'];

        return [
            'user_id' => User::inRandomorder()->first()->id,
            'full_name' => $this->faker->unique()->randomElement(User::pluck('name')),
            'gender' => $this->faker->randomElement($genders),
            'address' =>fake()->address(),
            'phone_number' => fake()->phoneNumber(),
            'profile_picture' => 'images/user.png',
            'data_of_birth' => fake()->date(),
        ];
    }
}
