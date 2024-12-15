<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'receipt_name' => $this->faker->name(),
            'address' => $this->faker->address(),
            'email' => $this->faker->email(),
            'phone_number' => $this->faker->phoneNumber(),
            'total_price' => $this->faker->numberBetween(50000, 100000),
        ];
    }
}
