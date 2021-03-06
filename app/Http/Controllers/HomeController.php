<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proposal;
use App\Models\Car;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Repositories\UserRepository;
use App\Repositories\ProposalRepository;

class HomeController extends Controller
{
     /** @var  UserRepository */
     private $userRepository;
     private $proposalRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserRepository $userRepo, ProposalRepository $proposalRepo)
    {
        $this->userRepository = $userRepo;
        $this->proposalRepository = $proposalRepo;

        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $carsCount = Car::count();

        //all cars except POS
        $carsCount = Car::where('state_id', '!=', 5)
                        ->where('state_id', '!=', 7)
                        ->count();
                        
        // $clientsCount = User::where('finiclasse_employee', '==', '0')->count();
        $user = Auth::user();
        $clientsCount =  $this->userRepository->getClients($user)->count();
        $proposalClosePer=null;

        // Propostas abertas
        $proposalOpen = Proposal::query()->with('state')->where('state_id', '=', 1)->count();

        // Percentagem de propostas fechadas 
        $proposals = Proposal::count();
        // $proposals = Proposal::where($proposal->car->condition_id, '=', '1');
        $proposalsOpenNew = Car::join('proposals', 'proposals.car_id', '=', 'cars.id')
        ->where('cars.condition_id', '=', 1)
        ->where('proposals.state_id', '=', 1)
        ->count();

        // $proposalsCloseNew = Proposal::join('cars', 'proposals.car_id', '=', 'cars.id')
        // ->where('cars.state_id', '=', 1)
        // ->where('proposals.state_id', '=', 2)
        // ->count();
        // ;
        
        $proposalsCloseNew = Car::join('proposals', 'proposals.car_id', '=', 'cars.id')
            ->where('cars.condition_id', '=', 1)
            ->where('proposals.state_id', '=', 2)
            ->count();
        
        // $proposalsOpenUsed = Proposal::join('cars', 'proposals.car_id', '=', 'cars.id')
        // ->where('cars.state_id', '=', 2)
        // ->orWhere('cars.state_id', '=', 4)
        // ->where('proposals.state_id', '=', 1)
        // ->count();

        $proposalsOpenUsed = Car::join('proposals', 'proposals.car_id', '=', 'cars.id')
            ->where('cars.condition_id', '=', 2)
            ->orWhere('cars.condition_id', '=', 4)
            ->where('proposals.state_id', '=', 1)
            ->count();

        $proposalsClosedUsed = Car::join('proposals', 'proposals.car_id', '=', 'cars.id')
        ->where('proposals.state_id', '=', 2)
        ->where('cars.condition_id', '=', 2)
        ->orWhere('cars.condition_id', '=', 4)
        ->count();

        $proposalClose = Proposal::query()->with('state')->where('state_id', '=', 2)->count();
        if ($proposalClose) {
            $proposalClosePer = ($proposalClose / $proposals) * 100;
        }

        // Ultimas propostas
        // $latestProposals = Proposal::latest()->where('car_id', '!=', null)->take(5)->get();
        $latestProposals = $this->proposalRepository->getProposalsByRole(Auth::user())->where('car_id', '!=', null)->take(5);

        return view('home')
            ->with('carsCount', $carsCount)
            ->with('clientsCount', $clientsCount)
            ->with('proposalOpen', $proposalOpen)
            ->with('proposalsOpenNew', $proposalsOpenNew)
            ->with('proposalsCloseNew', $proposalsCloseNew)
            ->with('proposalsOpenUsed', $proposalsOpenUsed)
            ->with('proposalsClosedUsed', $proposalsClosedUsed)
            ->with('proposalClosePer', $proposalClosePer)
            ->with('latestProposal', $latestProposals);
    }
}
