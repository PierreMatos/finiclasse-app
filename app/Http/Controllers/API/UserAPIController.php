<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateUserAPIRequest;
use App\Http\Requests\API\UpdateUserAPIRequest;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\UserResource;
use Response;
use Validator;
use Illuminate\Support\Facades\Auth;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

/**
 * Class UserController
 * @package App\Http\Controllers\API
 */

class UserAPIController extends AppBaseController
{
    /** @var  UserRepository */
    private $userRepository;
    public $token = true;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepository = $userRepo;
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    /**
     * Display a listing of the User.
     * GET|HEAD /users
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $users = $this->userRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return response()->json($users, 200); 

        return $this->sendResponse(UserResource::collection($users), 'Users retrieved successfully');
    }

    /**
     * Store a newly created User in storage.
     * POST /users
     *
     * @param CreateUserAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateUserAPIRequest $request)
    {
        $input = $request->all();

        $user = $this->userRepository->create($input);

        return $this->sendResponse(new UserResource($user), 'User saved successfully');
    }

    /**
     * Display the specified User.
     * GET|HEAD /users/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var User $user */
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            return $this->sendError('User not found');
        }

        return $this->sendResponse(new UserResource($user), 'User retrieved successfully');
    }

    /**
     * Update the specified User in storage.
     * PUT/PATCH /users/{id}
     *
     * @param int $id
     * @param UpdateUserAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUserAPIRequest $request)
    {
        $input = $request->all();

        /** @var User $user */
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            return $this->sendError('User not found');
        }

        $user = $this->userRepository->update($input, $id);

        return $this->sendResponse(new UserResource($user), 'User updated successfully');
    }

    /**
     * Remove the specified User from storage.
     * DELETE /users/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var User $user */
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            return $this->sendError('User not found');
        }

        $user->delete();

        return $this->sendSuccess('User deleted successfully');
    }

    function register (Request $request) {
        
        $validator = Validator::make($request->all(), 
        [ 
        'name' => 'required',
        'email' => 'required|email',
        'password' => 'required',  
        'c_password' => 'required|same:password', 
      ]);  
      
             if ($validator->fails()) {  
                 return response()->json(['error'=>$validator->errors()], 401); 
             }   
      
      
             $user = new User();
             $user->name = $request->name;
             $user->email = $request->email;
             $user->password = bcrypt($request->password);
             $user->save();
       
            //  if ($this->token) {
            //      return $this->login($request);
            //  }
       
             return response()->json([
                 'success' => true,
                 'data' => $user
             ], Response::HTTP_OK);

    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
                    'email' => ['required', 'string', 'email', 'max:255'],
                    'password' => 'required|string|min:6',
                ]);
        
        if ($validator->fails()) {  
            return response()->json(['error'=>$validator->errors()], 401); 
        }   
        
                //$input = $request->only('email', 'password');
                $jwt_token = null;
        
                if (!$jwt_token = JWTAuth::attempt($validator->validated())) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Invalid Email or Password',
                    ], Response::HTTP_UNAUTHORIZED);
                }
        
                return $this->createNewToken($jwt_token);

                return response()->json([
                    'success' => true,
                    'token' => $jwt_token,
                ]);
    }

     /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function createNewToken($token){
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'user' => auth()->user()
        ]);
    }

       /**
     * Display a listing of the Clients.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function getClients(Request $request)
    {

        // dd(Auth::user()->myLeads);

        // $clients= collect([]);
        
        // foreach( Auth::user()->myLeads as $lead ) {

        // $clients->push($lead);

        // }
        // dd('ola');

        // $clients = User::where('finiclasse_employee','=',1)->get();
        // $clients = Auth::user()->myLeads;

        $clients = Auth::user()->myLeads;
        // return response()->json($clients, 200); 

        return $this->sendResponse(UserResource::collection($clients), 'Users retrieved successfully');


    }
}
