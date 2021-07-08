<?php

namespace App\Repositories;

use App\Models\BenefitsProposals;
use App\Repositories\BaseRepository;

/**
 * Class BenefitsProposalsRepository
 * @package App\Repositories
 * @version July 8, 2021, 9:55 am UTC
*/

class BenefitsProposalsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'proposal_id',
        'benefit_id'
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
        return BenefitsProposals::class;
    }
}
