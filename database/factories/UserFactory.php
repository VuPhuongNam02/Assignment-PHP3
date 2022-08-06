<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
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
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2a$12$wIL/LwpPvrrHOgx5eE08r.7GIdsoUOMbqe47l3ybfSqZl3xMkfQ0C', // password
            'remember_token' => Str::random(10),
            'avatar' => $this->faker->imageUrl(100, 100),
            'phone' => $this->faker->phoneNumber(),
            'address' => $this->faker->address(),
            'role' => rand(0, 1),
            'status' => rand(0, 1),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
