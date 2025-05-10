<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected function schedule(Schedule $schedule): void
    {
        // Планировщик задач
        $schedule->command('telescope:prune')->daily();
    }

    protected function commands(): void
    {
        // Подгрузка artisan-команд
        $this->load(__DIR__.'/Commands');
        require base_path('routes/console.php');
    }
}
