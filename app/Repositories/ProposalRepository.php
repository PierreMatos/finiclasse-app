<?php

namespace App\Repositories;

use App\Models\Proposal;
use App\Repositories\BaseRepository;

/**
 * Class ProposalRepository
 * @package App\Repositories
 * @version May 26, 2021, 9:18 pm UTC
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
}
