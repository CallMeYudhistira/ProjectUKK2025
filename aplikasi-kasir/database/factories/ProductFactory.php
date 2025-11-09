<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Nette\Utils\Random;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $purchase_price = Random::generate('4', '0-9');
        return [
            'product_name' => fake()->firstName(),
            'pict' => null,
            'category_id' => Random::generate('2', '0-9'),
            'unit_id' => Random::generate('2', '0-9'),
            'purchase_price' => $purchase_price,
            'selling_price' => $purchase_price + Random::generate('4', '0-9'),
            'stock' => Random::generate('2', '0-9'),
        ];
    }
}
