<?php

namespace App\Repositories;

use App\Models\CarCondition;
use App\Repositories\BaseRepository;

/**
 * Class CarConditionRepository
 * @package App\Repositories
 * @version May 8, 2021, 11:30 am UTC
*/

class CarConditionRepository extends BaseRepository
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
        return CarCondition::class;
    }
}
