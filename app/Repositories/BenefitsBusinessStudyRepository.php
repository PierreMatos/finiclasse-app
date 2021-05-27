<?php

namespace App\Repositories;

use App\Models\BenefitsBusinessStudy;
use App\Repositories\BaseRepository;

/**
 * Class BenefitsBusinessStudyRepository
 * @package App\Repositories
 * @version May 26, 2021, 9:15 pm UTC
*/

class BenefitsBusinessStudyRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        
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
        return BenefitsBusinessStudy::class;
    }
}
