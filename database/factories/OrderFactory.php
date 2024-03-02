<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


class OrderFactory extends Factory
{

    public function definition(): array
    {
        return [
            "hotel_id"=>2,
            "table_id"=>1,
            "order_id"=>'ORD_' . str::random(10),
            "isPaid"=>1,
            "customer_name"=>$this->faker->name,
            "customer_mobile"=>$this->faker->phoneNumber(10),
            "customer_email"=>$this->faker->safeEmail(),
            "employee_id"=>"2"
        ];
    }
}
