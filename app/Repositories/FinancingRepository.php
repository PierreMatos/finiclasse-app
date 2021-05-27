<?php

namespace App\Repositories;

use App\Models\Financing;
use App\Repositories\BaseRepository;

/**
 * Class FinancingRepository
 * @package App\Repositories
 * @version May 27, 2021, 1:15 pm UTC
*/

class FinancingRepository extends BaseRepository
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
        return Financing::class;
    }
}
