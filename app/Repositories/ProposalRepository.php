<?php

namespace App\Repositories;

use App\Models\Proposal;
use App\Repositories\BaseRepository;

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

    public function getProposals($user){

        $proposals = Proposal::where('vendor_id', '=', $user)->orderBy('created_at', 'desc')->get();

        return $proposals;

    }
}
