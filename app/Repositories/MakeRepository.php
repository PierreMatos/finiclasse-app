<?php

namespace App\Repositories;

use App\Models\Make;
use App\Repositories\BaseRepository;

/**
 * Class MakeRepository
 * @package App\Repositories
 * @version May 7, 2021, 2:29 pm UTC
*/

class MakeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'visible'
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
        return Make::class;
    }
}
