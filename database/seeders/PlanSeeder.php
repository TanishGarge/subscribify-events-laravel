<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Plan::factory()->create([
            'name' => 'Basic'
        ]);
        Plan::factory()->create([
            'name' => 'Pro',
            'price_cents' => 11000
        ]);
    }
}
