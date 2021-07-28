<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DiscountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('discounts')->truncate(); //2回目実行の際にシーダー情報をクリア
        DB::table('discounts')->insert([
            'name' => '割引なし',
            'percent' => '0%',
            'discount' => 1,
        ]);
    }
}
