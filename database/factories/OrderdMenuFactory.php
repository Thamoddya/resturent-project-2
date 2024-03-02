<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderdMenu>
 */
class OrderdMenuFactory extends Factory
{

    public function definition(): array
    {

        return [
            "hotel_id"=>"2",
            "order_id"=>$this->faker->numberBetween(1,10),
            "qty"=>1,
        ];
    }
}
