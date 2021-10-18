<?php

namespace App\Repositories;

use App\Models\Car;
use App\Repositories\BaseRepository;

/**
 * Class CarRepository
 * @package App\Repositories
 * @version June 16, 2021, 11:28 am UTC
*/

class CarRepository  extends BaseRepository 
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'model_id',
        'category_id',
        'variant',
        'motorization',
        'komm',
        'plate'
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
        return Car::class;
    }

    public function carByState($condition){

        return Car::where('condition_id','==',$condition);

    }

     /**
     * Sets relations for eager loading.
     *
     * @param $relations
     * @return $this
     */
    public function withAll($pagination = null)
    {

        $query = $this->with('stand', 'state');

        if ($pagination) {

            return $query->paginate($pagination);
        }

        return $query->get();
    }

    // RETURNS CAR LIST WITHAOUT 'POS' state CARS

    public function all ($search = [], $skip = null, $limit = null, $columns = ['*']){

        $query = $this->allQuery($search, $skip, $limit);

        return $query->get($columns);
    }
}
