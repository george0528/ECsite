<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(StockTableSeeder::class);
        $this->call(PhotoSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(DiscountSeeder::class);
        $this->call(UserSeeder::class);
    }
}
