<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class OrderDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'orderId' => rand(1, 3),
            'productId' => rand(1, 3),
            'quantity' => rand(1, 10),
        ];
    }
}
