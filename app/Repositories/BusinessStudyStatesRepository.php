<?php

namespace App\Repositories;

use App\Models\BusinessStudyStates;
use App\Repositories\BaseRepository;

/**
 * Class BusinessStudyStatesRepository
 * @package App\Repositories
 * @version November 24, 2021, 11:33 pm UTC
*/

class BusinessStudyStatesRepository extends BaseRepository
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
        return BusinessStudyStates::class;
    }
}
