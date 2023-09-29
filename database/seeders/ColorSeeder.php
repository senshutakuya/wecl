<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ColorSeeder extends Seeder
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
        DB::table('colors')->insert([
            // Colors
            [
                'co_variable_id' => 1,
                'co_variable_value' => 'color',
                'co_id' => 1,
                'co_one_value' => '赤色',
                'co_two_value' => null,
            ],
            [
                'co_variable_id' => 1,
                'co_variable_value' => 'color',
                'co_id' => 2,
                'co_one_value' => 'オレンジ色',
                'co_two_value' => null,
            ],
            [
                'co_variable_id' => 1,
                'co_variable_value' => 'color',
                'co_id' => 3,
                'co_one_value' => '黄色',
                'co_two_value' => null,
            ],
            [
                'co_variable_id' => 1,
                'co_variable_value' => 'color',
                'co_id' => 4,
                'co_one_value' => '緑色',
                'co_two_value' => null,
            ],
            [
                'co_variable_id' => 1,
                'co_variable_value' => 'color',
                'co_id' => 5,
                'co_one_value' => '青色',
                'co_two_value' => null,
            ],
            // Colors (続き)
            [
                'co_variable_id' => 1,
                'co_variable_value' => 'color',
                'co_id' => 6,
                'co_one_value' => '紫色',
                'co_two_value' => null,
            ],
            [
                'co_variable_id' => 1,
                'co_variable_value' => 'color',
                'co_id' => 7,
                'co_one_value' => '茶色',
                'co_two_value' => null,
            ],
            [
                'co_variable_id' => 1,
                'co_variable_value' => 'color',
                'co_id' => 8,
                'co_one_value' => 'グレー/モノクローム',
                'co_two_value' => null,
            ],
            [
                'co_variable_id' => 1,
                'co_variable_value' => 'color',
                'co_id' => 9,
                'co_one_value' => '白色',
                'co_two_value' => null,
            ],
            [
                'co_variable_id' => 1,
                'co_variable_value' => 'color',
                'co_id' => 10,
                'co_one_value' => 'ベージュ/ヌード',
                'co_two_value' => null,
            ],
            
            // Colors (co_two_value に値がある場合)
            [
                'co_variable_id' => 2,
                'co_variable_value' => 'color',
                'co_id' => 1,
                'co_one_value' => null,
                'co_two_value' => '赤&黄',
            ],
            [
                'co_variable_id' => 2,
                'co_variable_value' => 'color',
                'co_id' => 2,
                'co_one_value' => null,
                'co_two_value' => '赤&青',
            ],
            [
                'co_variable_id' => 2,
                'co_variable_value' => 'color',
                'co_id' => 3,
                'co_one_value' => null,
                'co_two_value' => '赤&緑',
            ],
            [
                'co_variable_id' => 2,
                'co_variable_value' => 'color',
                'co_id' => 4,
                'co_one_value' => null,
                'co_two_value' => '赤&紫',
            ],
            [
                'co_variable_id' => 2,
                'co_variable_value' => 'color',
                'co_id' => 5,
                'co_one_value' => null,
                'co_two_value' => 'オレンジ&青',
            ],
            // Colors (co_two_value に値がある場合 - 続き)
            [
                'co_variable_id' => 2,
                'co_variable_value' => 'color',
                'co_id' => 6,
                'co_one_value' => null,
                'co_two_value' => 'オレンジ&緑',
            ],
            [
                'co_variable_id' => 2,
                'co_variable_value' => 'color',
                'co_id' => 7,
                'co_one_value' => null,
                'co_two_value' => 'オレンジ&紫',
            ],
            [
                'co_variable_id' => 2,
                'co_variable_value' => 'color',
                'co_id' => 8,
                'co_one_value' => null,
                'co_two_value' => '黄色&青',
            ],
            [
                'co_variable_id' => 2,
                'co_variable_value' => 'color',
                'co_id' => 9,
                'co_one_value' => null,
                'co_two_value' => '黄色&緑',
            ],
            [
                'co_variable_id' => 2,
                'co_variable_value' => 'color',
                'co_id' => 10,
                'co_one_value' => null,
                'co_two_value' => '黄色&紫',
            ],
            [
                'co_variable_id' => 2,
                'co_variable_value' => 'color',
                'co_id' => 11,
                'co_one_value' => null,
                'co_two_value' => '緑&青',
            ],
            [
                'co_variable_id' => 2,
                'co_variable_value' => 'color',
                'co_id' => 12,
                'co_one_value' => null,
                'co_two_value' => '緑&紫',
            ],
            [
                'co_variable_id' => 2,
                'co_variable_value' => 'color',
                'co_id' => 13,
                'co_one_value' => null,
                'co_two_value' => '青&紫',
            ],
            [
                'co_variable_id' => 2,
                'co_variable_value' => 'color',
                'co_id' => 14,
                'co_one_value' => null,
                'co_two_value' => 'ピンク&オレンジ',
            ],
            [
                'co_variable_id' => 2,
                'co_variable_value' => 'color',
                'co_id' => 15,
                'co_one_value' => null,
                'co_two_value' => 'ピンク&紫',
            ],
            [
                'co_variable_id' => 2,
                'co_variable_value' => 'color',
                'co_id' => 16,
                'co_one_value' => null,
                'co_two_value' => 'ブラウン&オレンジ',
            ],
            [
                'co_variable_id' => 2,
                'co_variable_value' => 'color',
                'co_id' => 17,
                'co_one_value' => null,
                'co_two_value' => 'ブラウン&緑',
            ],
            [
                'co_variable_id' => 2,
                'co_variable_value' => 'color',
                'co_id' => 18,
                'co_one_value' => null,
                'co_two_value' => 'ブラウン&青',
            ],
            [
                'co_variable_id' => 2,
                'co_variable_value' => 'color',
                'co_id' => 19,
                'co_one_value' => null,
                'co_two_value' => 'グレー&ブルー',
            ],
            [
                'co_variable_id' => 2,
                'co_variable_value' => 'color',
                'co_id' => 20,
                'co_one_value' => null,
                'co_two_value' => 'グレー&ピンク',
            ],
            [
                'co_variable_id' => 2,
                'co_variable_value' => 'color',
                'co_id' => 21,
                'co_one_value' => null,
                'co_two_value' => 'グレー&イエロー',
            ],
            [
                'co_variable_id' => 2,
                'co_variable_value' => 'color',
                'co_id' => 22,
                'co_one_value' => null,
                'co_two_value' => 'ホワイト&ブラック',
            ],
            [
                'co_variable_id' => 2,
                'co_variable_value' => 'color',
                'co_id' => 23,
                'co_one_value' => null,
                'co_two_value' => 'ホワイト&グリーン',
            ],
            [
                'co_variable_id' => 2,
                'co_variable_value' => 'color',
                'co_id' => 24,
                'co_one_value' => null,
                'co_two_value' => 'ホワイト&ブルー',
            ],
            // ここから新しいデータを追加してください
        ]);
    }

}
