<?php

namespace Database\Seeders;

use App\Models\Subscription;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubscriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usersWithUserRole = User::where('role', 'User')->get();

        $usersWithUserRole
            ->random(rand(0, $usersWithUserRole->count()))
            ->each(function($user) {
                Subscription::factory()->create([
                    'user_id' => $user->id
                ]);
            });

    }
}
