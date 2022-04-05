<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'status' => $this->faker->randomElement(['pending', 'processing', 'shipped', 'delivered', 'canceled']),
            'code' => $this->faker->unique()->randomNumber(6),
            'customer_name' => $this->faker->name,
            'phone' => $this->faker->phoneNumber,
            'payment_method' => $this->faker->randomElement(['credit card', 'debit card', 'cash']),
            'total_price' => $this->faker->randomFloat(2, 0, 100),
            'cart' => $this->faker->text,
            'observations' => $this->faker->text,
            'adress' => $this->faker->streetAddress,
            'adress_complement' => $this->faker->secondaryAddress,
        ];
    }
}
