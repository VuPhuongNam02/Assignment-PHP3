<?php

namespace Database\Factories;

use Faker\Core\Number;
use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'image' => $this->faker->imageUrl(100, 100),
            'price' => rand(100, 1000),
            'status' =>  rand(0, 1),
            'code' => Str::random(6),
            'slug' => $this->faker->slug(6),
            'sale' => rand(1, 100),
            'size' => "['m', 'lg', 'sm']",
            'description' => $this->faker->text(),
            'brand' => $this->faker->name(),
            'categoryId' => rand(1, 3),
        ];
    }
}
