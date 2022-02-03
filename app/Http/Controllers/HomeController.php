<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proposal;
use App\Models\Car;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Repositories\UserRepository;




class HomeController extends Controller
{
     /** @var  UserRepository */
     private $userRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserRepository $userRepo)
    {
        $this->userRepository = $userRepo;

        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $carsCount = Car::count();
        // $clientsCount = User::where('finiclasse_employee', '==', '0')->count();
        $user = Auth::user();
        $clientsCount =  $this->userRepository->getClients($user)->count();
        $proposalClosePer=null;

        // Propostas abertas
        $proposalOpen = Proposal::query()->with('state')->where('state_id', '=', 1)->count();

        // Percentagem de propostas fechadas 
        $proposals = Proposal::count();
        $proposalClose = Proposal::query()->with('state')->where('state_id', '=', 2)->count();
        if ($proposalClose) {
            $proposalClosePer = ($proposalClose / $proposals) * 100;
        }

        // Ultimas propostas
        $latestProposals = Proposal::latest()->where('car_id', '!=', null)->take(5)->get();

        return view('home')
            ->with('carsCount', $carsCount)
            ->with('clientsCount', $clientsCount)
            ->with('proposalOpen', $proposalOpen)
            ->with('proposalClosePer', $proposalClosePer)
            ->with('latestProposal', $latestProposals);
    }
}
