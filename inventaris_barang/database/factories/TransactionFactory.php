<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TransactionFactory extends Factory
{
    public function definition()
    {
        return [
            'quantity' => $this->faker->numberBetween(1, 20),
            'notes' => $this->faker->sentence(),
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now')
        ];
    }
}