<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    public function run()
    {
        // Seed the 'products' table with dummy data
        DB::table('testingdummyproduct')->insert([
            [
                'name' => 'Laptop',
                'price' => 999.99,
                'description' => 'Powerful laptop for all your computing needs.',
            ],
            [
                'name' => 'Smartphone',
                'price' => 599.99,
                'description' => 'Feature-rich smartphone with the latest technology.',
            ],
            [
                'name' => 'Headphones',
                'price' => 89.99,
                'description' => 'High-quality headphones for an immersive audio experience.',
            ],
            // Add more dummy data as needed
        ]);
    }
}