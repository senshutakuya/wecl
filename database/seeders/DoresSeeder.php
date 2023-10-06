<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DoresSeeder extends Seeder
{
    public function run()
    {
        // スタイルのデータを挿入
        $dores = [
            'カジュアルドレス', 'カクテルドレス', 'イブニングドレス', '結婚式のドレス','マキシドレス','ミディドレス','ミニドレス','サマードレス',
        ];

        $uniqueStyles = array_unique($dores); // 重複を削除

        foreach ($uniqueStyles as $dores) {
            DB::table('dores')->insert([
                'dores' => $dores,
            ]);
        }
    }
}
