<?php

namespace Database\Factories;

use App\Models\Plan;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subscription>
 */
class SubscriptionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $userId = User::where('role', 'User')->inRandomOrder()->first()->id;
        $planId = Plan::inRandomOrder()->first()->id;
        $status = fake()->randomElement(['active', 'cancelled']);

        if($status == 'active') {
            $startedAt = $this->faker->dateTimeBetween('-1 year', 'now');
            $cancelledAt = null;
        } else if($status == 'cancelled') {
            $startedAt = $this->faker->dateTimeBetween('-1 year', 'now');
            $cancelledAt = $this->faker->dateTimeBetween($startedAt, '+6 months');
        }


        return [
            'user_id' => $userId,
            'plan_id' => $planId,
            'status' => $status,
            'started_at' => $startedAt,
            'cancelled_at' => $cancelledAt
        ];
    }
}
