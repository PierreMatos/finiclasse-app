<?php

namespace App\Repositories;

use App\Models\TradeinState;
use App\Repositories\BaseRepository;

/**
 * Class TradeinStateRepository
 * @package App\Repositories
 * @version September 13, 2021, 3:50 pm UTC
*/

class TradeinStateRepository extends BaseRepository
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
        return TradeinState::class;
    }
}
