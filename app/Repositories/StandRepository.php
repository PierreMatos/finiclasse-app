<?php

namespace App\Repositories;

use App\Models\Stand;
use App\Repositories\BaseRepository;

/**
 * Class StandRepository
 * @package App\Repositories
 * @version May 7, 2021, 2:27 pm UTC
*/

class StandRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name'
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
        return Stand::class;
    }

    public function getStands($user){

        if ($user->hasRole(['admin', 'Administrador', 'Diretor comercial'])){
        
            $stands = Stand::all(); 

            return $stands;

        }elseif($user->hasRole(['Chefe de vendas'])){

            $stands = Stand::where('id','=', $user->stand_id)->get();

            return $stands;
        }
    }
}
