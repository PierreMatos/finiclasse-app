<?php

namespace App\Repositories;

use App\Models\Proposal;
use App\Repositories\BaseRepository;
use App\Models\User;
use Illuminate\Support\Facades\Auth;



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
        'client_id',
        'vendor_id'
        
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

            // $proposal->vendor->stand_id = $user->stand_id;
            // $proposals = Proposal::where('stand_id','=', $user->stand_id)->orderBy('created_at', 'desc')->get();
            // $proposals = Proposal::orderBy('created_at', 'desc')->get();

            $proposals = Proposal::whereHas('vendor', function($q){

                $q->where('stand_id', '=', Auth::user()->stand_id);
            
            })->get();

            return $proposals;
        }

    }

    public function proposalHistory($vendor,$client){

        $proposals = Proposal::where('vendor_id', '=', $vendor)
            ->where('client_id', '=', $client)
            // ->where(function($query) {
            //     $query->where('state_id', '2')
            //           ->orWhere('state_id', '>', 4);
            // })
            ->orderBy('created_at', 'desc')->get();

        return $proposals;
    }
}
