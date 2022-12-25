<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'product_code' => fake()->unique()->randomNumber(6),
            'product_line' => fake()->randomElement(['Mercedes Benz AMG GT','Lexus CT','Mercedes-Maybach S', 'Lamborghini Reventon 6.5','BMWX01']),
            'brand' => fake()->randomElement(['Mercedes','Lexus','Lamborghini','BMW']),
            'product_name' => fake()->randomElement(['Mercedes Benz AMG GT','CT 200h Executive','Mercedes-Maybach S','Lamborghini Reventon 6.5 V12','BMW X1']),
            'status' => fake()->randomElement(['mới sản xuất','đưa về đại lý','đang ở đại lý']),
            'factory_code' => fake()->randomElement(['F100','F101','F102']),
            'store_code' => fake()->randomElement(['S100','S101','S102','S103']),
            'manufacturing_date' => fake()->dateTimeBetween('01-01-2022', 'now', 'Asia/Ho_Chi_Minh'),
        ];
    }
}
