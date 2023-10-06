<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OverlapSeeder extends Seeder
{
    public function run()
    {
        // スタイルのデータを挿入
        $overlaps = [
            'キャップ', 'ベレー帽', 'ニット帽', 'ハンチング','ハット','クロッシェ','バケットハット','パイロットキャップ'
        ];

        $uniqueStyles = array_unique($overlaps); // 重複を削除

        foreach ($uniqueStyles as $overlap) {
            DB::table('overlaps')->insert([
                'overlap' => $overlap,
            ]);
        }
    }
}
