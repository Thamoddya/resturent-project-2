<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
            "hotel_id" =>2,
            "order_id"=>$this->faker->numberBetween(1,10),
            "total_price" =>$this->faker->numberBetween(100,200),
            "invoice_id"=>Str::uuid(),
        ];
    }
}
