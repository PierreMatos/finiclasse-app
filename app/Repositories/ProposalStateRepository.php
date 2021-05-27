<?php

namespace App\Repositories;

use App\Models\ProposalState;
use App\Repositories\BaseRepository;

/**
 * Class ProposalStateRepository
 * @package App\Repositories
 * @version May 26, 2021, 9:06 pm UTC
*/

class ProposalStateRepository extends BaseRepository
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
        return ProposalState::class;
    }
}
