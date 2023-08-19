<?php

namespace Database\Seeders;

use App\Models\Budget;
use App\Models\Expense;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(5)
            ->hasProfile(1)
            ->hasEvents(2)
            ->create()
            ->each(function ($user) {
                $user->events->each(function ($event) {
                    $event->budgets()->saveMany(
                        Budget::factory(3)->create([
                            'event_id' => $event->id,
                        ])
                            ->each(function ($budget) {
                                $budget->expenses()->saveMany(Expense::factory(5)->create([
                                    'budget_id' => $budget->id,
                                ]));
                            })
                    );
                });
            });
    }
}
