<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccessorySeeder extends Seeder
{
    public function run()
    {
        // スタイルのデータを挿入
        $accessories = [
            'ネックレス', 'ブレスレット', 'イヤリング', 'リング','サングラス','スカーフ',
        ];

        $uniqueStyles = array_unique($accessories); // 重複を削除

        foreach ($uniqueStyles as $accessory) {
            DB::table('accessories')->insert([
                'accessory' => $accessory,
            ]);
        }
    }
}
