<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Menu>
 */
class MenuFactory extends Factory
{
    public function definition(): array
    {
        return [
            'hotel_id' =>"1",
            'menu_name' => $this->faker->sentence,
            'menu_price' => $this->faker->numberBetween(500,2500),
            'menu_image_path' => "/images/menus/menu1708694199_65d89ab7ba8f5.jpg",
            'menu_available' => 1,
            'menu_description' => $this->faker->paragraph,
        ];
    }
}
