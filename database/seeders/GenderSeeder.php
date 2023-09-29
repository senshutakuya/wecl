<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    // GenderSeeder.php

    public function run()
    {
        // カラム名を指定してデータを挿入
        DB::table('genders')->insert([
            ['gender' => '男性用'],
            ['gender' => '女性用'],
            ['gender' => 'どちらでも着れる'],
        ]);
    }

}
