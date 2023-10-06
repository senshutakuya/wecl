<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OuterwareSeeder extends Seeder
{
    public function run()
    {
        // スタイルのデータを挿入
        $outerwares = [
            'ジャケット', 'コート', 'ブルゾン', 'ベスト','ピーコート','ダウンジャケット','ブレザー','カーディガン',
        ];

        $uniqueStyles = array_unique($outerwares); // 重複を削除

        foreach ($uniqueStyles as $outerware) {
            DB::table('outerwares')->insert([
                'outerware' => $outerware,
            ]);
        }
    }
}
