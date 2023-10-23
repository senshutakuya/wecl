<?php

namespace Database\Seeders;

use App\Models\Style;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StyleSeeder extends Seeder
{
    public function run()
    {
        // スタイルのデータを挿入
        $styles = [
            'ナチュラル', 'ストリート',
            '古着','スポーツ', 'ロック', 
            'カジュアル', '可愛い系', 'フォーマル系',
            'モード系', 'ボーイッシュ系',
            'トラッド系',
        ];

        $uniqueStyles = array_unique($styles); // 重複を削除

        foreach ($uniqueStyles as $style) {
            DB::table('styles')->insert([
                'style' => $style,
            ]);
        }
    }
}
