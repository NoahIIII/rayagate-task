<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
        return [
            'name' => $this->faker->unique()->word(),
            'price' => $this->faker->randomFloat(2, 100, 1000), // Generates a random float with 2 decimal places
            'quantity' => $this->faker->numberBetween(1, 100),
            'description'=>$this->faker->sentence(5),
        ];
    }
}
