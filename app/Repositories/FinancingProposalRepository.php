<?php

namespace App\Repositories;

use App\Models\FinancingProposal;
use App\Repositories\BaseRepository;

/**
 * Class FinancingProposalRepository
 * @package App\Repositories
 * @version May 27, 2021, 1:15 pm UTC
*/

class FinancingProposalRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'description',
        'value',
        'financing_id',
        'proposal_id'
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
        return FinancingProposal::class;
    }
}
