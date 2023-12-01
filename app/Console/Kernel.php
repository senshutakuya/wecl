<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;
use App\Models\Outfit;
use App\Models\Starcode;

class Kernel extends ConsoleKernel
{
    /**
     * アプリケーションのコマンド実行スケジュール定義
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            // 3日以上前にソフトデリートされた Outfit レコードを検索して物理的に削除
            Outfit::onlyTrashed()
                ->where('deleted_at', '<=', now()->subDays(3))
                ->forceDelete();

            // 3日以上前にソフトデリートされた Starcode レコードを検索して物理的に削除
            Starcode::onlyTrashed()
                ->where('deleted_at', '<=', now()->subDays(3))
                ->forceDelete();
        })->dailyAt('12:00')->timezone('UTC');
        // herokuでam　12:00で設定してる
    }



    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
