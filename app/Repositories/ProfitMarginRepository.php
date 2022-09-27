<?php

namespace App\Repositories;

use App\Models\ProfitMargin;
use App\Repositories\BaseRepository;

/**
 * Class ProfitMarginRepository
 * @package App\Repositories
 * @version September 27, 2022, 11:50 am WEST
*/

class ProfitMarginRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'make_id',
        'car_fuel_id',
        'car_category_id',
        'level_1',
        'level_2',
        'level_3'
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
        return ProfitMargin::class;
    }
}
