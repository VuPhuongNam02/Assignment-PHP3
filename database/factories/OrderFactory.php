<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class OrderFactory extends Factory
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
            'phone' => rand(100, 10000),
            'address' => $this->faker->text(),
            'email' => $this->faker->email(),
            'total' => rand(100, 10000),
            'payment' => rand(0, 1),
            'userId' => rand(1, 3),
        ];
    }
}
