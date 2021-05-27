<?php

namespace App\Repositories;

use App\Models\BusinenssStudyAuthorization;
use App\Repositories\BaseRepository;

/**
 * Class BusinenssStudyAuthorizationRepository
 * @package App\Repositories
 * @version May 26, 2021, 9:11 pm UTC
*/

class BusinenssStudyAuthorizationRepository extends BaseRepository
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
        return BusinenssStudyAuthorization::class;
    }
}
