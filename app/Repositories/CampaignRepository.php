<?php

namespace App\Repositories;

use App\Models\Campaign;
use App\Repositories\BaseRepository;

/**
 * Class CampaignRepository
 * @package App\Repositories
 * @version July 5, 2021, 5:31 pm UTC
*/

class CampaignRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'description',
        'model_id'
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
        return Campaign::class;
    }
}
