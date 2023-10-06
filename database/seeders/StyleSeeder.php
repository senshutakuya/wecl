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
            'きれいめ&シンプル', 'ナチュラル', 'アメカジ', 'ストリート', 'トラッド',
            'ワーク', 'ミリタリー', 'サーフ', '古着', 'アウトドア',
            'スポーツ', 'モード', 'ロック', 'フレンチカジュアル', 'ビジネス・スーツ',
            'コンサバ', 'きれいめ', 'カジュアル', '可愛い系', 'フォーマル系',
            'クール系', 'モード系', 'ボーイッシュ系', 'シンプル', 'リラックスコーデ',
            'カジュアル', 'マニッシュコーデ', 'スポーティーMIX', 'トラッド系',
        ];

        $uniqueStyles = array_unique($styles); // 重複を削除

        foreach ($uniqueStyles as $style) {
            DB::table('styles')->insert([
                'style' => $style,
            ]);
        }
    }
}
