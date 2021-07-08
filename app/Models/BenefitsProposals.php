<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class BenefitsProposals
 * @package App\Models
 * @version July 8, 2021, 9:55 am UTC
 *
 * @property \App\Models\Benefits $benefit
 * @property \App\Models\Proposals $proposal
 * @property integer $benefit_id
 * @property integer $proposal_id
 */
class BenefitsProposals extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'benefits_proposals';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'benefit_id',
        'proposal_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'benefit_id' => 'integer',
        'proposal_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function benefit()
    {
        return $this->belongsTo(\App\Models\Benefits::class, 'benefit_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function proposal()
    {
        return $this->belongsTo(\App\Models\Proposals::class, 'proposal_id', 'id');
    }
}
