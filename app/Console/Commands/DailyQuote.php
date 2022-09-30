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

        $from = $dt->hour(7)->minute(0)->second(0)->toDateTimeString();
        $to = $dt->hour(21)->minute(0)->second(0)->toDateTimeString();
        $cars = Car::whereBetween('created_at', [$from, $to])->count();

       
        $users = User::whereBetween('created_at', [$from, $to])->count();
        $proposalsOpen = Proposal::whereBetween('updated_at', [$from, $to])->where('state_id', '=', 1)->count();
        // $proposalsOpen = Proposal::with('state')->where('state_id', '=', 1)->whereBetween('created_at', [$from, $to])->count();
        // $proposalsOpen = Proposal::query()->with('state')->where('state_id', '=', 1)->whereBetween('created_at', [$from, $to])->count();
        $proposalsClose = Proposal::whereBetween('created_at', [$from, $to])->where('state_id', '=', 2)->count();
        
        $fromDate = $dt->hour(7)->minute(0)->second(0)->format(('d-m'));

        Mail::send(new ResumeDaily($cars, $users, $proposalsOpen, $proposalsClose, $fromDate, $fromDate));
    }
}
