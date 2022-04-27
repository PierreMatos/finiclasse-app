<?php

namespace App\Http\Controllers;

use Flash;
use Response;
use Validator;
use Carbon\Carbon;
use App\Models\Car;
use App\Models\User;
use App\Models\LeadUser;
use App\Mail\ValidateRGPD;
use App\Providers\NewLead;
use Illuminate\Http\Request;
use App\Repositories\CarRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Repositories\StandRepository;
use Illuminate\Support\Facades\Route;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Repositories\ClientTypeRepository;
use App\Http\Controllers\AppBaseController;
use App\Providers\PushNewLead;
use App\Providers\PushRGPD;

class UserController extends AppBaseController
{
    /** @var  UserRepository */
    private $userRepository;
    private $standRepository;
    private $clientTypeRepository;
    private $carRepository;

    public function __construct(UserRepository $userRepo, StandRepository $standRepo, ClientTypeRepository $clientTypeRepo, CarRepository $carRepo)
    {
        $this->userRepository = $userRepo;
        $this->standRepository = $standRepo;
        $this->clientTypeRepository = $clientTypeRepo;
        $this->carRepository = $carRepo;
    }

    /**
     * Display a listing of the User.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {

        $users = $this->userRepository->all();

        return view('users.index')
            ->with('users', $users);
    }

    /**
     * Show the form for creating a new User.
     *
     * @return Response
     */
    public function create()
    {
        // VARIAVEIS REFERENTES AS LISTAGENS DE MODELOS ($modelName)
        $stands = $this->standRepository->all();
        $clientTypes = $this->clientTypeRepository->all();
        $cars = Car::whereNotNull('plate')->get();
        $leads = $this->userRepository->getSellers(Auth::user());

        $userData = ([
            'stands' => $stands,
            'clientTypes' => $clientTypes,
            'cars' => $cars,
            'leads' => $leads,
        ]);

        $url = Route::currentRouteName();

        if ($url == 'users.create') {
            return view('users.create')
                ->with('userData', $userData);
        } elseif ($url == 'sellers.create') {
            return view('sellers.create')
                ->with('userData', $userData);
        }
    }

    /**
     * Store a newly created User in storage.
     *
     * @param CreateUserRequest $request
     *
     * @return Response
     */
    public function store(CreateUserRequest $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'sometimes|unique:users',
            'nif' => 'sometimes|nullable|unique:users',
        ]);

        $input = $request->all();

        if($validator->fails()) {
            Flash::error($validator->errors());
            return redirect(route('users.index'));
        }

        $url = Route::currentRouteName();

        if ($url == 'users.store') {
            $user = $this->userRepository->create($input);
        } elseif ($url == 'sellers.store') {
            $user = $this->userRepository->create($input)->assignRole('Vendedor');
        }
        
        //atribuir lead user a vendedor
        if($request->vendor_id){
            $user->vendor()->attach($request->vendor_id);

            //Event for Notification
            event(new NewLead($user));

            //Event Push & Notification for New Vendor Lead
            event(new PushNewLead($user));
        }

        if ($user->gdpr_type == "email") {
            Mail::send(new ValidateRGPD($user));
        } elseif ($user->gdpr_type == "sms") {
            // Something
        }

        // //Event for Notification
        // event(new PushNewUser($user));

        Flash::success(__('translation.user saved'));

        if ($url == 'users.store') {
            return redirect(route('getClients'));
        } elseif ($url == 'sellers.store') {
            return redirect(route('getSellers'));
        }
    }

    /**
     * Display the specified User.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::success(__('translation.user saved'));

            return redirect(route('users.index'));
        }

        $url = Route::currentRouteName();

        if ($url == 'users.show') {
            return view('users.show')
                ->with('user', $user);
        } elseif ($url == 'sellers.show') {
            return view('sellers.show')
                ->with('user', $user);
        }
    }

    /**
     * Show the form for editing the specified User.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        // DADOS DO Cliente PARA EDITAR
        $user = $this->userRepository->find($id);

        // VARIAVEIS REFERENTES AS LISTAGENS DE MODELOS ($modelName)
        $stands = $this->standRepository->all();
        $clientTypes = $this->clientTypeRepository->all();
        $cars = Car::whereNotNull('plate')->get();
        $leads =  $this->userRepository->getSellers(Auth::user());

        $userData = ([
            'stands' => $stands,
            'clientTypes' => $clientTypes,
            'cars' => $cars,
            'leads' => $leads,
        ]);

        if (empty($user)) {
            Flash::success(__('translation.user saved'));

            return redirect(route('users.index'));
        }

        $url = Route::currentRouteName();

        if ($url == 'users.edit') {
            return view('users.edit')
                ->with('user', $user)
                ->with('userData', $userData);
        } elseif ($url == 'sellers.edit') {
            return view('sellers.edit')
                ->with('user', $user)
                ->with('userData', $userData);
        }
    }

    /**
     * Update the specified User in storage.
     *
     * @param int $id
     * @param UpdateUserRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUserRequest $request)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::success(__('translation.user saved'));

            return redirect(route('users.index'));
        }

        //atribuir lead user a vendedor
        if($request->vendor_id != '')  {

  
                if($request->vendor_id != $user->vendor[0]->id){

                $user->vendor()->sync($request->vendor_id);

                $user = $this->userRepository->update($request->all(), $id);

                //Event for Notification
                event(new NewLead($user));

                //Event Push & Notification for New Vendor Lead
                event(new PushNewLead($user));
            } else {
                $user = $this->userRepository->update($request->all(), $id);
            }
        }

        Flash::success(__('translation.user updated'));

        $url = Route::currentRouteName();

        if ($url == 'users.update') {
            return redirect(route('getClients'));
        } elseif ($url == 'sellers.update') {
            return redirect(route('getSellers'));
        }
    }

    /**
     * Remove the specified User from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::success(__('translation.user saved'));

            return redirect(route('users.index'));
        }

        $this->userRepository->delete($id);

        Flash::success(__('translation.user deleted'));

        $url = Route::currentRouteName();

        if ($url == 'users.destroy') {
            return redirect(route('getClients'));
        } elseif ($url == 'sellers.destroy') {
            return redirect(route('getSellers'));
        }
    }

    /**
     * Display a listing of the Clients.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function getClients()
    {
        $user = Auth::user();

        $clients =  $this->userRepository->getClients($user);

        return view('users.index')
            ->with('users', $clients);
    }

    /**
     * Display a listing of the Clients.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function getSellers()
    {
        $user = Auth::user();

        $sellers =  $this->userRepository->getSellers($user);

        return view('sellers.index')
            ->with('users', $sellers);
    }

    public function createValidateRGPD($id)
    {
        $user = $this->userRepository->find($id);

        Mail::send(new ValidateRGPD($user));

        Flash::success(__('translation.email success'));

        return redirect(route('getClients'));
    }

    public function storeValidateRGPD($id)
    {
        $user = $this->userRepository->find($id);

        $timestamp = Carbon::now();

        $user = $this->userRepository->update(['gdpr_confirmation' => $timestamp, 'gdpr_type' => "email"], $id);

        //Push & Nofication RGDP
        event(new PushRGPD($user));

        return view('thankyou');
    }
}
