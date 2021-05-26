<?php

namespace App\Repositories;

use App\Models\ProposalStates;
use App\Repositories\BaseRepository;

/**
 * Class ProposalStatesRepository
 * @package App\Repositories
 * @version May 7, 2021, 2:28 pm UTC
*/

class ProposalStatesRepository extends BaseRepository
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
        return ProposalStates::class;
    }
}
