<?php

namespace App\Repositories;

use App\Models\CarClass;
use App\Repositories\BaseRepository;

/**
 * Class CarClassRepository
 * @package App\Repositories
 * @version May 8, 2021, 11:30 am UTC
*/

class CarClassRepository extends BaseRepository
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
        return CarClass::class;
    }
}
