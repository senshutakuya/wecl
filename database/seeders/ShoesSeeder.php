<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShoesSeeder extends Seeder
{
    public function run()
    {
        // スタイルのデータを挿入
        $shoes = [
            'スニーカー', 'ブーツ', 'ヒールシューズ', 'フラットシューズ','サンダル','ローファー','エスパドリーユ','レインブーツ'
        ];

        $uniqueStyles = array_unique($shoes); // 重複を削除

        foreach ($uniqueStyles as $shoes) {
            DB::table('shoes')->insert([
                'shoes' => $shoes,
            ]);
        }
    }
}
