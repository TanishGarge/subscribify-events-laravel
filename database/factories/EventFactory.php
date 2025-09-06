<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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

        $title = $this->faker->sentence(3);
        $start = $this->faker->dateTimeBetween('+1 week', '+1 month');
        $end   = (clone $start)->modify('+2 hours');
        $publicSalesStart = (clone $start)->modify('-1 week');
        $salesEnd = (clone $end)->modify('-1 day');

        return [
            'title' => $title,
            'slug' => Str::slug($title) . '-' . Str::random(5),
            'description' => $this->faker->paragraph(),
            'venue' => $this->faker->company(),
            'city' => $this->faker->city(),
            'starts_at' => $start,
            'ends_at' => $end,
            'capacity' => $this->faker->numberBetween(50, 500),
            'public_price_cents' => $this->faker->numberBetween(1000, 10000), // ₹10 - ₹100
            'member_discount_percent' => $this->faker->randomElement([0, 5, 10, 15, 20]),
            'public_sales_start' => $publicSalesStart,
            'sales_end' => $salesEnd,
        ];
    }
}
