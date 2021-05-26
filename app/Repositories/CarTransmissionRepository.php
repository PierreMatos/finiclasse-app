<?php

namespace App\Repositories;

use App\Models\CarTransmission;
use App\Repositories\BaseRepository;

/**
 * Class CarTransmissionRepository
 * @package App\Repositories
 * @version May 8, 2021, 11:31 am UTC
*/

class CarTransmissionRepository extends BaseRepository
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
        return CarTransmission::class;
    }
}
