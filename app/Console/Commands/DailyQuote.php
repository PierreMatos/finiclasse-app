<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Car;
use App\Models\User;
use App\Models\Proposal;
use App\Mail\ResumeDaily;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class DailyQuote extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'quote:daily';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Respectively send an exclusive quote to everyone daily via email.';

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
        $dt = Carbon::yesterday();

        $startDate = $dt->hour(7)->minute(0)->second(0)->toDateTimeString();
        $endDate = $dt->hour(21)->minute(0)->second(0)->toDateTimeString();
        $cars = Car::whereBetween('created_at', [$startDate, $endDate])->count();

        // $cars = Car::where('updated_at', '>=', Carbon::yesterday()->('21:30'))
        //             ->where('state_id', '=', 1)
        //             ->count();

        $users = User::where('created_at', '>=', Carbon::today())->count();
        $proposalsOpen = Proposal::query()->with('state')->where('state_id', '=', 1)->where('created_at', '>=', Carbon::today())->count();
        $proposalsClose = Proposal::query()->with('state')->where('state_id', '=', 2)->where('created_at', '>=', Carbon::today())->count();

        Mail::send(new ResumeDaily($cars, $users, $proposalsOpen, $proposalsClose, $startDate, $endDate));
    }
}
