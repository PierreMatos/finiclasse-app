<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Proposal
 * @package App\Models
 * @version May 27, 2021, 1:14 pm UTC
 *
 * @property \App\Models\User $client
 * @property \App\Models\ProposalState $state
 * @property \App\Models\BusinessStudy $businessStudy
 * @property integer $client_id
 * @property integer $vendor_id
 * @property integer $price
 * @property integer $pos_number
 * @property integer $prop_value
 * @property integer $first_contact_date
 * @property integer $last_contact_date
 * @property integer $next_contact_date
 * @property string $contract
 * @property boolean $test_drive
 * @property integer $state_id
 * @property integer $business_study_id
 * @property string $comment
 */
class Proposal extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'proposals';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'client_id',
        'vendor_id',
        'price',
        'pos_number',
        'prop_value',
        'first_contact_date',
        'last_contact_date',
        'next_contact_date',
        'contract',
        'test_drive',
        'state_id',
        'business_study_id',
        'comment'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'client_id' => 'integer',
        'vendor_id' => 'integer',
        'price' => 'integer',
        'pos_number' => 'integer',
        'prop_value' => 'integer',
        'first_contact_date' => 'integer',
        'last_contact_date' => 'integer',
        'next_contact_date' => 'integer',
        'contract' => 'string',
        'test_drive' => 'boolean',
        'state_id' => 'integer',
        'business_study_id' => 'integer',
        'comment' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'state_id' => 'required',
        'business_study_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function client()
    {
        return $this->belongsTo(\App\Models\User::class, 'client_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function state()
    {
        return $this->belongsTo(\App\Models\ProposalState::class, 'state_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function businessStudy()
    {
        return $this->belongsTo(\App\Models\BusinessStudy::class, 'business_study_id', 'id');
    }
}
