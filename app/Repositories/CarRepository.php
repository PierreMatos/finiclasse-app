<?php

namespace App\Repositories;

use App\Models\Car;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Auth;

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

    public function carByCondition($condition){

        $query = $this->all();

        $query = $query->where('condition_id','==',$condition);

        return $query;

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

    public function all($search = [], $skip = null, $limit = null, $columns = ['*']){

        $user = Auth::user();
        $query = $this->model->newQuery();

        if ($user->hasRole(['admin', 'Administrador', 'Diretor comercial'])){
    
            $query = $this->allQuery($search, $skip, $limit);

        }elseif($user->hasRole(['Chefe de vendas', 'Vendedor'])){ 

            // $query = $query->where('stand_id','=', $user->stand_id);

        }

        return $query->get($columns);
    }

        /**
     * Paginate records for scaffold.
     *
     * @param int $perPage
     * @param array $columns
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function paginate($perPage, $columns = ['*'])
    {

        $query = $this->allQuery();

        return $query->paginate($perPage, $columns);
    }
}
