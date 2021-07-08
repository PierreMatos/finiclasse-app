<?php

namespace App\Repositories;

use App\Models\CarModel;
use App\Repositories\BaseRepository;

/**
 * Class CarModelRepository
 * @package App\Repositories
 * @version May 25, 2021, 10:00 pm UTC
*/

class CarModelRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'make_id'
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
        return CarModel::class;
    }
}
