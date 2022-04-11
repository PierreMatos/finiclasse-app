<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Models\User;
use App\Repositories\UserRepository;

class WebNotificationAPIController extends AppBaseController
{
    private $userRepository;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepository = $userRepo;
        $this->middleware('auth');
    }
    
    public function storeToken(Request $request)
    {
        $user = $this->userRepository->find($request->user);

        if ($user->device_key != $request->token ){

            $user->update(['device_key'=>$request->token]);
            return response()->json(['Token successfully stored.']);

        }
    }
}