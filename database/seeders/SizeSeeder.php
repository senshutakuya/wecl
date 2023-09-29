<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SizeSeeder extends Seeder
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
        DB::table('sizes')->insert([
            ['size' => 'S'],
            ['size' => 'M'],
            ['size' => 'L'],
            ['size' => 'オーバーサイズ'],

        ]);
    }

}
             // $table->enum('size', ['S', 'M', 'L', 'オーバーサイズ']);