<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Period>
 */
class PeriodFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'time_period' => $this->faker->randomElement(['12', '24', '36', '6', '18', '30']),
            'interest' => $this->faker->randomElement(['0.1', '0.08', '0.05', '0.03']),
        ];
    }
}
