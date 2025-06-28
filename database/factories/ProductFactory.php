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
        $categories = [1,2,3,4];     
        return [
            'name' => 'Producto ' . $this->faker->word,
            'description' => $this->faker->sentence(10),
            'price' => $this->faker->numberBetween(5000, 20000),
            'image_url' => $this->faker->imageUrl(640, 480, 'food'),
            'category_id' => $this->faker->randomElement($categories),
            'is_featured' => $this->faker->boolean(30),
            'stock' => $this->faker->numberBetween(0, 100)
        ];
    }
}
