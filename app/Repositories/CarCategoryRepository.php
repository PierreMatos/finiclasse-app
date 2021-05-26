<?php

namespace App\Repositories;

use App\Models\CarCategory;
use App\Repositories\BaseRepository;

/**
 * Class CarCategoryRepository
 * @package App\Repositories
 * @version May 8, 2021, 11:28 am UTC
*/

class CarCategoryRepository extends BaseRepository
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
        return CarCategory::class;
    }
}
