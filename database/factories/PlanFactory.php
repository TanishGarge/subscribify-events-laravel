<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Plan>
 */
class PlanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->randomElement(['Basic', 'Pro']);
        $priceCents = fake()->numberBetween(1000, 10000);
        $memberDiscountPercent = fake()->randomFloat(2, 10, 50);
        $earlyAccessHours = fake()->numberBetween(1, 48);
        $isActive = fake()->boolean(70);

        return [
            'name' => $name,
            'price_cents' => $priceCents,
            'member_discount_percent' => $memberDiscountPercent,
            'early_access_hours' => $earlyAccessHours,
            'is_active' =>  $isActive
        ];
    }
}
