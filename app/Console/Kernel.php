<?php

namespace App\Console;

use Illuminate\Support\Facades\App;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        Commands\DailyQuote::class,
        Commands\WeeklyQuote::class,
        Commands\MonthlyQuote::class,
        Commands\ProposalQuote::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('quote:daily')
            ->dailyAt('9:00')->weekdays()->timezone('Europe/Lisbon');

        $schedule->command('quote:weekly')
            ->weeklyOn(1, '9:00')->timezone('Europe/Lisbon');

        $schedule->command('quote:monthly')
            ->monthly('9:00')->timezone('Europe/Lisbon');

        $schedule->command('quote:proposal')
            ->weeklyOn(1, '9:00')->timezone('Europe/Lisbon');

        //Não funciona em production    
        if (!App::environment('production')) {
            $schedule->command('seeds:daily')
                ->dailyAt('09:00')->timezone('Europe/Lisbon');
        }
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}