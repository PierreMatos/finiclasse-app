<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proposal;
use App\Models\Car;
use App\Models\User;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $latestProposals = Proposal::latest()->take(5)->get();
        $carsCount = Car::count();
        $proposalsCount = Proposal::count();
        $clientsCount = User::where('finiclasse_employee', '==', '0')->count();



        return view('home')
        ->with('carsCount', $carsCount)
        ->with('proposalsCount', $proposalsCount)
        ->with('clientsCount', $clientsCount)
        ->with('latestProposal', $latestProposals);
    }
}
