<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImpressionSeeder extends Seeder
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
        DB::table('impressions')->insert([
            ['inmpression' => '1色'],
            ['inmpression' => '2色'],
            ['inmpression' => '柄'],
            ['inmpression' => 'プリント'],
        ]);
    }

}
