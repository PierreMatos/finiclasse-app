<?php

namespace App\Repositories;

use App\Models\CarDrive;
use App\Repositories\BaseRepository;

/**
 * Class CarDriveRepository
 * @package App\Repositories
 * @version May 8, 2021, 11:30 am UTC
*/

class CarDriveRepository extends BaseRepository
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
        return CarDrive::class;
    }
}
