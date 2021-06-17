<?php

namespace App\Repositories;

use App\Models\CarFuel;
use App\Repositories\BaseRepository;

/**
 * Class CarFuelRepository
 * @package App\Repositories
 * @version June 16, 2021, 11:28 am UTC
*/

class CarFuelRepository extends BaseRepository
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
        return CarFuel::class;
    }
}
