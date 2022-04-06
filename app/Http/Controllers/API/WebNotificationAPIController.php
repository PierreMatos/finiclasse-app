<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

class WebNotificationAPIController extends AppBaseController
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function storeToken(Request $request)
    {
        auth()->user()->update(['device_key'=>$request->token]);
        return response()->json(['Token successfully stored.']);
    }
}