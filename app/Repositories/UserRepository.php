<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\BaseRepository;

/**
 * Class UserRepository
 * @package App\Repositories
 * @version June 17, 2021, 9:21 am UTC
*/

class UserRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'email'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return User::class;
    }

    // filter clients by roles
    public function getClients($user)
    {
        
        if ($user->hasRole(['admin', 'Administrador', 'Diretor comercial'])){
        
            $clients = User::where('finiclasse_employee', '=', 0)->orderBy('created_at', 'desc')->get();

            return $clients;

        }elseif($user->hasRole(['Chefe de vendas'])){

            $clients = User::where('finiclasse_employee', '=', 0)

                ->where('stand_id','=', $user->stand_id)->orderBy('created_at', 'desc')->get();

                return $clients;
        }
    }

    public function getVendors($user){

        if ($user->hasRole(['admin', 'Administrador', 'Diretor comercial'])){
        
            $vendors = User::role('Vendedor')->orderBy('created_at', 'desc')->get(); 

            return $vendors;

        }elseif($user->hasRole(['Chefe de vendas'])){

            $vendors = User::role('Vendedor')
            ->where('stand_id','=', $user->stand_id)->orderBy('created_at', 'desc')->get();

                return $vendors;
        }
    }
}
