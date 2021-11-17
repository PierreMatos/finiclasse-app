<?php

namespace App\Repositories;

use App\Models\BusinessStudyAuthorization;
use App\Repositories\BaseRepository;

/**
 * Class BusinessStudyAuthorizationRepository
 * @package App\Repositories
 * @version May 26, 2021, 9:11 pm UTC
*/

class BusinessStudyAuthorizationRepository extends BaseRepository
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
        return BusinessStudyAuthorization::class;
    }
}
