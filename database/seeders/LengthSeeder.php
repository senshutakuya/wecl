<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LengthSeeder extends Seeder
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
        DB::table('lengths')->insert([
            ['length' => '袖なし'],
            ['length' => '半袖'],
            ['length' => '七分丈'],
            ['length' => '長袖'],
        ]);
    }

}
            // $table->enum('length', ['半袖', '七分丈', '長袖', '袖なし']);