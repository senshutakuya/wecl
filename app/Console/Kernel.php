<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Models\Outfit;
use App\Models\Starcode;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            // 3日以上前に削除された Outfit レコードを物理的に削除
            Outfit::where('deleted_at', '<=', now()->subDays(3))->forceDelete();
    
            // 3日以上前に削除された Starcode レコードを物理的に削除
            Starcode::where('deleted_at', '<=', now()->subDays(3))->forceDelete();
        })->daily();
    }



    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
