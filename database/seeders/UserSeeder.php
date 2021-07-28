<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate(); //2回目実行の際にシーダー情報をクリア
        DB::table('users')->insert([
            'name' => '運営者',
            'email' => 'a@a',
            'password' => bcrypt('Jota0329'),
        ]);
    }
}
