<?php

namespace App\Repositories;

use App\Models\Benefit;
use App\Repositories\BaseRepository;

/**
 * Class BenefitRepository
 * @package App\Repositories
 * @version May 26, 2021, 9:07 pm UTC
*/

class BenefitRepository extends BaseRepository
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
        return Benefit::class;
    }
}
