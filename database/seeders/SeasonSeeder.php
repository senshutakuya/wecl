<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeasonSeeder extends Seeder
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
        DB::table('seasons')->insert([
            ['season' => '春用'],
            ['season' => '夏用'],
            ['season' => '秋用'],
            ['season' => '冬用'],
            ['season' => 'ALLシーズン'],
        ]);
    }

}
