<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Proposal;
use Illuminate\Console\Command;
use App\Providers\PushCheckProposal;

class ProposalQuote extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'quote:proposal';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Checks if the proposal has been open for more than 8 days and sends a notification (normal/push).';

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
        $proposals = Proposal::query()->with('state')->where('state_id', '=', 1)->where('updated_at', '<=', Carbon::now()->subWeek()->endOfWeek())->get();

        foreach($proposals as $proposal) {
            event(new PushCheckProposal($proposal));
        }
    }
}
