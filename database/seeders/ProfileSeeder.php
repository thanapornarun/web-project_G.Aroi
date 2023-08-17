<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Profile;
use Faker\Factory as Faker;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            Profile::create([
                'user_id' => $faker->numberBetween(1, 10), // Assuming user IDs range from 1 to 10
                'full_name' => $faker->name,
                'gender' => $faker->randomElement(['Male', 'Female']),
                'address' => $faker->address,
                'phone_number' => $faker->phoneNumber,
                'profile_image' => null, // You can add logic to generate profile images if needed
                'data_of_birth' => $faker->dateTimeThisCentury->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
