<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('inspire')->hourly();
        $schedule->call(function () {
        // Thực hiện công việc lập lịch
    })->daily(); // Ví dụ: Chạy công việc mỗi ngày

    $schedule->command('=post:cron')->withoutOverlapping()->everyMinute(); // Ví dụ: Chạy lệnh Artisan mỗi tuần

    $schedule->exec('php /path/to/script.php')->cron('* * * * *'); // Ví dụ: Thực thi tệp script PHP theo cú pháp cron job
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
