<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Nette\Utils\Random;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vehicle>
 */
class VehicleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'pict' => 'photo.png',
            'vehicle_name' => $this->faker->lastName(),
            'brand' => $this->faker->firstName(),
            'type' => $this->faker->randomElement(['motor', 'mobil']),
            'price' => Random::generate('10', '0-9'),
            'production_year' => $this->faker->year(),
        ];
    }
}
