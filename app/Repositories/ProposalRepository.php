<?php

namespace App\Repositories;

use App\Models\Proposal;
use App\Repositories\BaseRepository;
use App\Models\User;


/**
 * Class ProposalRepository
 * @package App\Repositories
 * @version May 27, 2021, 1:14 pm UTC
*/

class ProposalRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        
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
        return Proposal::class;
    }

    public function getProposalsByVendor($user){

        $proposals = Proposal::where('vendor_id', '=', $user)->orderBy('created_at', 'desc')->get();

        return $proposals;

    }

    public function getProposalsByRole($user){

        if ($user->hasRole(['admin', 'Administrador', 'Diretor comercial'])){
        
            $proposals = Proposal::orderBy('created_at', 'desc')->get();

            return $proposals;

        }elseif($user->hasRole(['Chefe de vendas'])){

            $proposals = Proposal::where('stand_id','=', $user->stand_id)->orderBy('created_at', 'desc')->get();

            return $proposals;
        }

    }
}
