<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;



class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    
    public function run()
    {
        DB::table('products')->insert([
            ['product_code' => '110001', 'product_line' => 'Audi R8', 'brand' => 'Audi', 'status' => 'mới sản xuất', 'factory_code' => 'F100', 'manufacturing_date' => fake()->dateTime()],
            ['product_code' => '110002', 'product_line' => 'Audi S3 Sedan', 'brand' => 'Audi', 'status' => 'mới sản xuất', 'factory_code' => 'F100', 'manufacturing_date' => fake()->dateTime()],
            ['product_code' => '110003', 'product_line' => 'Toyota Prius', 'brand' => 'Toyota', 'status' => 'mới sản xuất', 'factory_code' => 'F100', 'manufacturing_date' => fake()->dateTime()],
            ['product_code' => '110004', 'product_line' => 'Toyota Camry', 'brand' => 'Toyota', 'status' => 'mới sản xuất', 'factory_code' => 'F100', 'manufacturing_date' => fake()->dateTime()],
            ['product_code' => '110005', 'product_line' => 'Toyota Innova', 'brand' => 'Toyota', 'status' => 'mới sản xuất', 'factory_code' => 'F100', 'manufacturing_date' => fake()->dateTime()],

         ]);

        DB::table('factories')->insert([
            ['factory_code' => 'F100', 'factory_name' => fake()->company(), 'address' => fake()->address()],
         ]);
    }
}
