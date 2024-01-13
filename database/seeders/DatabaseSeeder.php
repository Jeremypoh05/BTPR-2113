<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         // Seed the users table
        \App\Models\User::factory(100)->create();
        
        // Seed the testing_dummy_product table
        DB::table('testing_dummy_product')->insert([
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
        ]);
    }
}
