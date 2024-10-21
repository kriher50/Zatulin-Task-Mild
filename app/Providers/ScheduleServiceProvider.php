<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Console\Scheduling\Schedule;

class ScheduleServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     */

    public function boot(Schedule $schedule)
    {
        $schedule->command('news:fetch')->dailyAt('05:00');
        // Ежедневный запуск команды в 05:00
    }
}
