<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PartSeeder extends Seeder
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
        DB::table('parts')->insert([
            ['part' => 'トップス'],
            ['part' => 'ボトムス'],
            ['part' => 'アウターウェア'],
            ['part' => 'ドレス'],
            ['part' => 'インナーウェア'],
            ['part' => 'アクセサリー'],
            ['part' => '靴'],
            ['part' => '被り物'],
        ]);
    }

}
