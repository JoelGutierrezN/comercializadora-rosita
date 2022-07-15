<?php

namespace Database\Factories;

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
            'code' => $this->faker->unique()->countryCode(),
            'description' => $this->faker->text(),
            'provider_id' => rand(1,200),
            'price' => $this->faker->randomNumber(3),
            'provider_price' => $this->faker->randomNumber(3),
            'wholesale' => (string)rand(0,1),
            'stock' => $this->faker->randomNumber(3),
            'wholesale_price' => $this->faker->randomNumber(3),
            'wholesale_quantity' => $this->faker->randomNumber(3),
            'photo' => null,
            'status' => (string)rand(0,1),
            'user_id' => 1
        ];
    }
}
