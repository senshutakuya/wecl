<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StyleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('styles')->insert([
            // Man Style
            [
                'st_variable_id' => 1,
                'st_variable_value' => 'man',
                'st_id' => 1,
                'st_man_value' => 'きれいめ&シンプル',
                'st_woman_value' => null,
                'st_gender_value' => null,
            ],
            [
                'st_variable_id' => 1,
                'st_variable_value' => 'man',
                'st_id' => 2,
                'st_man_value' => 'ナチュラル',
                'st_woman_value' => null,
                'st_gender_value' => null,
            ],
            [
                'st_variable_id' => 1,
                'st_variable_value' => 'man',
                'st_id' => 3,
                'st_man_value' => 'アメカジ',
                'st_woman_value' => null,
                'st_gender_value' => null,
            ],
            [
                'st_variable_id' => 1,
                'st_variable_value' => 'man',
                'st_id' => 4,
                'st_man_value' => 'ストリート',
                'st_woman_value' => null,
                'st_gender_value' => null,
            ],
            [
                'st_variable_id' => 1,
                'st_variable_value' => 'man',
                'st_id' => 5,
                'st_man_value' => 'トラッド',
                'st_woman_value' => null,
                'st_gender_value' => null,
            ],
            [
                'st_variable_id' => 1,
                'st_variable_value' => 'man',
                'st_id' => 6,
                'st_man_value' => 'ワーク',
                'st_woman_value' => null,
                'st_gender_value' => null,
            ],
            [
                'st_variable_id' => 1,
                'st_variable_value' => 'man',
                'st_id' => 7,
                'st_man_value' => 'ミリタリー',
                'st_woman_value' => null,
                'st_gender_value' => null,
            ],
            [
                'st_variable_id' => 1,
                'st_variable_value' => 'man',
                'st_id' => 8,
                'st_man_value' => 'サーフ',
                'st_woman_value' => null,
                'st_gender_value' => null,
            ],
            [
                'st_variable_id' => 1,
                'st_variable_value' => 'man',
                'st_id' => 9,
                'st_man_value' => '古着',
                'st_woman_value' => null,
                'st_gender_value' => null,
            ],
            [
                'st_variable_id' => 1,
                'st_variable_value' => 'man',
                'st_id' => 10,
                'st_man_value' => 'アウトドア',
                'st_woman_value' => null,
                'st_gender_value' => null,
            ],
            [
                'st_variable_id' => 1,
                'st_variable_value' => 'man',
                'st_id' => 11,
                'st_man_value' => 'スポーツ',
                'st_woman_value' => null,
                'st_gender_value' => null,
            ],
            [
                'st_variable_id' => 1,
                'st_variable_value' => 'man',
                'st_id' => 12,
                'st_man_value' => 'モード',
                'st_woman_value' => null,
                'st_gender_value' => null,
            ],
            [
                'st_variable_id' => 1,
                'st_variable_value' => 'man',
                'st_id' => 13,
                'st_man_value' => 'ロック',
                'st_woman_value' => null,
                'st_gender_value' => null,
            ],
            [
                'st_variable_id' => 1,
                'st_variable_value' => 'man',
                'st_id' => 14,
                'st_man_value' => 'フレンチカジュアル',
                'st_woman_value' => null,
                'st_gender_value' => null,
            ],
            [
                'st_variable_id' => 1,
                'st_variable_value' => 'man',
                'st_id' => 15,
                'st_man_value' => 'ビジネス・スーツ',
                'st_woman_value' => null,
                'st_gender_value' => null,
            ],
            [
                'st_variable_id' => 2,
                'st_variable_value' => 'woman',
                'st_id' => 1,
                'st_man_value' => null,
                'st_woman_value' => 'ナチュラル',
                'st_gender_value' => null,
            ],
            [
                'st_variable_id' => 2,
                'st_variable_value' => 'woman',
                'st_id' => 2,
                'st_man_value' => null,
                'st_woman_value' => 'コンサバ',
                'st_gender_value' => null,
            ],
            [
                'st_variable_id' => 2,
                'st_variable_value' => 'woman',
                'st_id' => 3,
                'st_man_value' => null,
                'st_woman_value' => 'きれいめ',
                'st_gender_value' => null,
            ],
            [
                'st_variable_id' => 2,
                'st_variable_value' => 'woman',
                'st_id' => 4,
                'st_man_value' => null,
                'st_woman_value' => 'カジュアル',
                'st_gender_value' => null,
            ],
            [
                'st_variable_id' => 2,
                'st_variable_value' => 'woman',
                'st_id' => 5,
                'st_man_value' => null,
                'st_woman_value' => '可愛い系',
                'st_gender_value' => null,
            ],
            [
                'st_variable_id' => 2,
                'st_variable_value' => 'woman',
                'st_id' => 6,
                'st_man_value' => null,
                'st_woman_value' => 'フォーマル系',
                'st_gender_value' => null,
            ],
            [
                'st_variable_id' => 2,
                'st_variable_value' => 'woman',
                'st_id' => 7,
                'st_man_value' => null,
                'st_woman_value' => 'クール系',
                'st_gender_value' => null,
            ],
            [
                'st_variable_id' => 2,
                'st_variable_value' => 'woman',
                'st_id' => 8,
                'st_man_value' => null,
                'st_woman_value' => 'モード系',
                'st_gender_value' => null,
            ],
            [
                'st_variable_id' => 2,
                'st_variable_value' => 'woman',
                'st_id' => 9,
                'st_man_value' => null,
                'st_woman_value' => 'ボーイッシュ系',
                'st_gender_value' => null,
            ],
            [
                'st_variable_id' => 3,
                'st_variable_value' => 'gender',
                'st_id' => 1,
                'st_man_value' => null,
                'st_woman_value' => null,
                'st_gender_value' => 'ナチュラル',
            ],
            [
                'st_variable_id' => 3,
                'st_variable_value' => 'gender',
                'st_id' => 2,
                'st_man_value' => null,
                'st_woman_value' => null,
                'st_gender_value' => 'シンプル'
            ],
            [
                'st_variable_id' => 3,
                'st_variable_value' => 'gender',
                'st_id' => 3,
                'st_man_value' => null,
                'st_woman_value' => null,
                'st_gender_value' => 'リラックスコーデ'
            ],
            [
                'st_variable_id' => 3,
                'st_variable_value' => 'gender',
                'st_id' => 4,
                'st_man_value' => null,
                'st_woman_value' => null,
                'st_gender_value' => 'カジュアル'
            ],
            [
                'st_variable_id' => 3,
                'st_variable_value' => 'gender',
                'st_id' => 5,
                'st_man_value' => null,
                'st_woman_value' => null,
                'st_gender_value' => 'マニッシュコーデ'
            ],
            [
                'st_variable_id' => 3,
                'st_variable_value' => 'gender',
                'st_id' => 6,
                'st_man_value' => null,
                'st_woman_value' => null,
                'st_gender_value' => 'スポーティーMIX'
            ],
            [
                'st_variable_id' => 3,
                'st_variable_value' => 'gender',
                'st_id' => 7,
                'st_man_value' => null,
                'st_woman_value' => null,
                'st_gender_value' => 'トラッド系'
            ],
            [
                'st_variable_id' => 3,
                'st_variable_value' => 'gender',
                'st_id' => 8,
                'st_man_value' => null,
                'st_woman_value' => null,
                'st_gender_value' => 'モード系'
            ],
            [
                'st_variable_id' => 3,
                'st_variable_value' => 'gender',
                'st_id' => 9,
                'st_man_value' => null,
                'st_woman_value' => null,
                'st_gender_value' => 'クール系'
            ],


        ]);
    }
}
