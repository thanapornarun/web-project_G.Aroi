<?php

namespace Database\Seeders;

use App\Models\Event_Role;
use Database\Factories\Event_RoleFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Event_Role::factory(5)->create();
    }
}
