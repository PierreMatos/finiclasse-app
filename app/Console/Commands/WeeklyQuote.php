<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Car;
use App\Models\User;
use App\Models\Proposal;
use App\Mail\ResumeWeekly;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class WeeklyQuote extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'quote:weekly';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Respectively send an exclusive quote to everyone weekly via email.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $from = Carbon::now()->subWeek()->startOfWeek();
        $to = Carbon::now()->subWeek()->endOfWeek();

        $cars = Car::whereBetween('created_at', [$from, $to])->count();

        $users = User::whereBetween('created_at', [$from, $to])->count();

        $proposalsOpen = Proposal::whereBetween('updated_at', [$from, $to])
            ->where('state_id', '=', 1)->count();

        $proposalsClose = Proposal::whereBetween('updated_at', [$from, $to])
            ->where('state_id', '=', 2)->count();

        Mail::send(new ResumeWeekly($cars, $users, $proposalsOpen, $proposalsClose));
    }
}
