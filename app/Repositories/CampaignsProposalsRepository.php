<?php

namespace App\Repositories;

use App\Models\CampaignsProposals;
use App\Repositories\BaseRepository;

/**
 * Class CampaignsProposalsRepository
 * @package App\Repositories
 * @version July 8, 2021, 9:55 am UTC
*/

class CampaignsProposalsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id',
        'campaign_id',
        'proposal_id'
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
        return CampaignsProposals::class;
    }
}
