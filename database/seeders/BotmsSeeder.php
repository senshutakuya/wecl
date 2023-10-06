<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BotmsSeeder extends Seeder
{
    public function run()
    {
        // スタイルのデータを挿入
        $botms = [
            'ジーンズ', 'スラックス', 'ショートパンツ', 'スカート','レギンス','パンツ','ショーツ','キュロット',
        ];

        $uniqueStyles = array_unique($botms); // 重複を削除

        foreach ($uniqueStyles as $botms) {
            DB::table('botms')->insert([
                'botms' => $botms,
            ]);
        }
    }
}
