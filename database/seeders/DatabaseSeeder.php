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
        /*
        DB::table('users')->insert([
            'place_code' => 'ADMIN',
            'username' => 'admin',
            'password' => bcrypt('admin'),
            'user_role' => 'admin'
        ]);*/

        /*
        DB::table('products')->insert([
            ['product_code' => '110001', 'product_line' => 'Mercedes Benz AMG GT', 'product_name' => 'Mercedes Benz AMG GT', 'brand' => 'Mercedes', 'status' => 'mới sản xuất', 'factory_code' => 'F100', 'manufacturing_date' => fake()->dateTime()],
            ['product_code' => '110002', 'product_line' => 'Lexus CT', 'product_name' => 'CT 200h Executive', 'brand' => 'Lexus', 'status' => 'mới sản xuất', 'factory_code' => 'F100', 'manufacturing_date' => fake()->dateTime()],
            ['product_code' => '110003', 'product_line' => 'Mercedes-Maybach S', 'product_name' => 'Mercedes-Maybach S', 'brand' => 'Mercedes', 'status' => 'mới sản xuất', 'factory_code' => 'F100', 'manufacturing_date' => fake()->dateTime()],
            ['product_code' => '110004', 'product_line' => 'Lamborghini Reventon 6.5', 'product_name' => '2008 Lamborghini Reventon 6.5 V12', 'brand' => 'Lamborghini', 'status' => 'mới sản xuất', 'factory_code' => 'F100', 'manufacturing_date' => fake()->dateTime()],
            ['product_code' => '110005', 'product_line' => 'BMWX01', 'product_name' => 'BMW X1', 'brand' => 'BMW', 'status' => 'mới sản xuất', 'factory_code' => 'F100', 'manufacturing_date' => fake()->dateTime()],

         ]);

        DB::table('productlines')->insert([
            [
                'productline_code' => 'LXCT01', 
                'productline_name' => 'Lexus CT', 
                'make' => 'Lexus',
                'year' => '2016',
                'engine_type' => 'Hybrid',
                'transmission' => '7 speed automatic',
                'drive_type' => 'front wheel drive',
                'cylinder' => 'inline 4',
                'total_seats' => '5',
                'total_doors' => '5',
                'basic_warranty_years' => '4'
            ],
            [
                'productline_code' => 'LXUX01', 
                'productline_name' => 'Lexus UX', 
                'make' => 'Lexus',
                'year' => '2020',
                'engine_type' => 'Hybrid',
                'transmission' => '7 speed automatic',
                'drive_type' => 'front wheel drive',
                'cylinder' => 'inline 4',
                'total_seats' => '5',
                'total_doors' => '5',
                'basic_warranty_years' => '4'
            ],
            [
                'productline_code' => 'MAGT', 
                'productline_name' => 'Mercedes Benz AMG GT', 
                'make' => 'Mercedes',
                'year' => '2014',
                'engine_type' => 'V8',
                'transmission' => '7 speed automatic',
                'drive_type' => 'rear-wheel drive',
                'cylinder' => 'V8',
                'total_seats' => '2',
                'total_doors' => '3',
                'basic_warranty_years' => '4'
            ],
            [
                'productline_code' => 'MBS01', 
                'productline_name' => 'Mercedes Maybach S', 
                'make' => 'Mercedes',
                'year' => '2016',
                'engine_type' => 'V12',
                'transmission' => '7 speed automatic',
                'drive_type' => 'rear-wheel drive',
                'cylinder' => 'V12',
                'total_seats' => '4',
                'total_doors' => '2',
                'basic_warranty_years' => '5'
            ],
            [
                'productline_code' => 'LRVT1', 
                'productline_name' => 'Lamborghini Reventon 6.5', 
                'make' => 'Lamborghini',
                'year' => '2007',
                'engine_type' => 'V12',
                'transmission' => '6 speed manual',
                'drive_type' => 'all-wheel drive',
                'cylinder' => 'V12',
                'total_seats' => '2',
                'total_doors' => '2',
                'basic_warranty_years' => '5'
            ],
            [
                'productline_code' => 'BMWX01', 
                'productline_name' => 'BMW X1', 
                'make' => 'BMW',
                'year' => '2018',
                'engine_type' => 'V12',
                'transmission' => '8 speed automatic',
                'drive_type' => 'rear-wheel drive',
                'cylinder' => 'V12',
                'total_seats' => '5',
                'total_doors' => '4',
                'basic_warranty_years' => '4'
            ],
         ]);*/
    }
}
