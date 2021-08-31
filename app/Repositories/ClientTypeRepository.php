<?php

namespace App\Repositories;

use App\Models\ClientType;
use App\Repositories\BaseRepository;

/**
 * Class ClientTypeRepository
 * @package App\Repositories
 * @version August 2, 2021, 2:02 pm UTC
*/

class ClientTypeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'description'
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
        return ClientType::class;
    }
}
