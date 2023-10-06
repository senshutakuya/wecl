<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TopsSeeder extends Seeder
{
    public function run()
    {
        // スタイルのデータを挿入
        $tops = [
            'Tシャツ', 'シャツ', 'ブラウス', 'ポロシャツ', 'タンクトップ', 'スウェットシャツ', 'カーディガン', 'パーカー',
        ];

        $uniqueStyles = array_unique($tops); // 重複を削除

        foreach ($uniqueStyles as $tops) {
            DB::table('tops')->insert([
                'tops' => $tops,
            ]);
        }
    }
}
