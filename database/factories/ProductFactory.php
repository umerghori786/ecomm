<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
    public function definition()
    {
        return [
            'title'=>fake()->name(),
            'sub_category_id' => rand(1,15),
            'short_description' => fake()->paragraph(),
            'long_description' => fake()->paragraph(),
            'strike_price' => rand(10,300),
            'discount_price' => rand(10,200),
            'sub_category_id' => rand(1,25),
        ];
    }
}
