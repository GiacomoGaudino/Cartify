<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Product>
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
        $faker = $this->faker;

        $products = [
            ["name" => "Smartphone", "min" => 300, "max" => 1200],
            ["name" => "Laptop", "min" => 700, "max" => 2500],
            ["name" => "Cuffie Bluetooth", "min" => 50, "max" => 300],
            ["name" => "Smartwatch", "min" => 100, "max" => 800],
            ["name" => "Tablet", "min" => 200, "max" => 1500],
        ];

        $product = $products[array_rand($products)];

        $brand = $faker->company();

        $adjective = $faker->optional()->randomElement(['Pro', 'Max', 'Ultra', 'Lite', 'Plus']);
        $name = trim($brand . ' ' . $product['name'] . ' ' . $adjective);

        $price = $faker->numberBetween($product['min'] * 100, $product['max'] * 100) / 100;
        $price = floor($price) + 0.99;

        $phrases = [
            'Design moderno e prestazioni eccellenti.',
            'Alta affidabilità e qualità costruttiva.',
            'Ideale per un utilizzo quotidiano senza compromessi.',
        ];

        return [
            'name' => $name,
            'description' => $name . ' perfetto per ' .
                $faker->randomElement(['lavoro', 'gaming', 'tempo libero', 'ufficio']) .
                '. ' . $faker->randomElement($phrases),
            'price' => $price,
        ];
    }
}
