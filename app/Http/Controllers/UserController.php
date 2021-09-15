<?php

namespace App\Http\Controllers;

use Flash;
use Response;
use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Repositories\StandRepository;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Repositories\ClientTypeRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\Auth;


class UserController extends AppBaseController
{
    /** @var  UserRepository */
    private $userRepository;
    private $standRepository;
    private $clientTypeRepository;

    public function __construct(UserRepository $userRepo, StandRepository $standRepo, ClientTypeRepository $clientTypeRepo)
    {
        $this->userRepository = $userRepo;
        $this->standRepository = $standRepo;
        $this->clientTypeRepository = $clientTypeRepo;
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

        $userData = ([
            'stands' => $stands,
            'clientTypes' => $clientTypes,
        ]);

        return view('users.create')
            ->with('userData', $userData);
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

        Flash::success('User saved successfully.');

        return redirect(route('users.index'));
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
        $vendors =  $this->userRepository->getVendors(Auth::user());

        $userData = ([
            'stands' => $stands,
            'clientTypes' => $clientTypes,
            'vendors' => $vendors,
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

        return redirect(route('users.index'));
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

        return redirect(route('users.index'));
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
   

}
