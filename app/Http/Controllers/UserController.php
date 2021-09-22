<?php

namespace App\Http\Controllers;

use Flash;
use Response;
use Carbon\Carbon;
use App\Models\Car;
use App\Models\User;
use App\Models\LeadUser;
use App\Mail\ValidateRGPD;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use App\Repositories\CarRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Repositories\StandRepository;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Repositories\ClientTypeRepository;
use App\Http\Controllers\AppBaseController;

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
        $leads =  $this->userRepository->getVendors(Auth::user());

        $userData = ([
            'stands' => $stands,
            'clientTypes' => $clientTypes,
            'cars' => $cars,
            'leads' => $leads,
        ]);

        $url = url()->previous();
        $route = app('router')->getRoutes($url)->match(app('request')->create($url))->getName();

        if ($route == 'getClients') {
            return view('users.create')
                ->with('userData', $userData);
        } elseif ($route == 'getVendors') {
            return view('vendors.create')
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
        $input = $request->all();

        $user = $this->userRepository->create($input);

        if ($user->gdpr_type == "email") {
            Mail::send(new ValidateRGPD($user));
        } elseif ($user->gdpr_type == "sms") {
            // Something
        }

        Flash::success('User saved successfully.');

        $url = url()->previous();
        $route = app('router')->getRoutes($url)->match(app('request')->create($url))->getName();

        if ($route == 'users.create') {
            return redirect(route('getClients'));
        } elseif ($route == 'vendors.create') {
            return redirect(route('getVendors'));
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
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        return view('users.show')->with('user', $user);
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
        $leads =  $this->userRepository->getVendors(Auth::user());

        $userData = ([
            'stands' => $stands,
            'clientTypes' => $clientTypes,
            'cars' => $cars,
            'leads' => $leads,
        ]);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        return view('users.edit')
            ->with('user', $user)
            ->with('userData', $userData);
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
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        $user = $this->userRepository->update($request->all(), $id);

        Flash::success('User updated successfully.');

        $url = url()->previous();
        $route = app('router')->getRoutes($url)->match(app('request')->create($url))->getName();

        if ($route == 'users.create') {
            return redirect(route('getClients'));
        } elseif ($route == 'vendors.create') {
            return redirect(route('getVendors'));
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
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        $this->userRepository->delete($id);

        Flash::success('User deleted successfully.');

        $url = url()->previous();
        $route = app('router')->getRoutes($url)->match(app('request')->create($url))->getName();

        if ($route == 'getClients') {
            return redirect(route('getClients'));
        } elseif ($route == 'getVendors') {
            return redirect(route('getVendors'));
        }
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
    public function getVendors(Request $request)
    {
        $user = Auth::user();

        $vendors =  $this->userRepository->getVendors($user);

        return view('vendors.index')
            ->with('users', $vendors);
    }

    public function createValidateRGPD($id)
    {
        $user = $this->userRepository->find($id);

        Mail::send(new ValidateRGPD($user));

        Flash::success('E-mail enviado com sucesso!');

        return redirect(route('users.index'));
    }

    public function storeValidateRGPD($id)
    {
        $user = $this->userRepository->find($id);

        $timestamp = Carbon::now();

        $user = $this->userRepository->update(['gdpr_confirmation' => $timestamp, 'gdpr_type' => "email"], $id);

        return view('thankyou');
    }
}
