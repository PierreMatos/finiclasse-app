<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class CampaignsProposals
 * @package App\Models
 * @version July 8, 2021, 9:55 am UTC
 *
 * @property \App\Models\Campaigns $benefit
 * @property \App\Models\Proposals $proposal
 * @property integer $campaign_id
 * @property integer $proposal_id
 */
class CampaignsProposals extends Model
{
    // use SoftDeletes;

    use HasFactory;

    public $table = 'campaigns_proposals';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'id',
        'campaign_id',
        'proposal_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'campaign_id' => 'integer',
        'proposal_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'campaign_id' => 'required',
        'proposal_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function benefit()
    {
        return $this->belongsTo(\App\Models\Campaigns::class, 'benefit_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function proposal()
    {
        return $this->belongsTo(\App\Models\Proposals::class, 'proposal_id', 'id');
    }
}
