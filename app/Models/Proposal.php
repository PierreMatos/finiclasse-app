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
 * @property string $comment
 * @property integer $tradein_id
 * @property integer $tradein_diff
 * @property integer $settle_amount
 * @property integer $total_diff_amount
 * @property integer $total_discount_amount
 * @property integer $total_discount_perc
 * @property integer $authorization_id
 * @property integer $car_id
 * @property integer $tradein_id
 * 
 * 
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
        'comment',
        'tradein_diff',
        'settle_amount',
        'total_diff_amount',
        'total_discount_amount',
        'total_discount_perc',
        'authorization_user_id',
        'car_id',
        'tradein_id'

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
        'comment' => 'string',
        'tradein_diff' => 'integer',
        'settle_amount' => 'integer',
        'total_diff_amount' => 'integer',
        'total_discount_amount' => 'integer',
        'total_discount_perc' => 'integer',
        'car_id' => 'integer',
        'tradein_id' => 'integer'

    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        // 'state_id' => 'required',
        // 'business_study_id' => 'required'
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
    public function vendor()
    {
        return $this->belongsTo(\App\Models\User::class, 'vendor_id', 'id');
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
    // public function businessStudy()
    // {
    //     return $this->belongsTo(\App\Models\BusinessStudy::class, 'business_study_id', 'id');
    // }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function car()
    {
        return $this->belongsTo(\App\Models\Car::class, 'car_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function tradein()
    {
        return $this->belongsTo(\App\Models\Car::class, 'tradein_id', 'id');
    }

    /**
     * The benefits that belong to the proposal.
     */
    public function benefits()
    {
        // return $this->belongsToMany(Benefit::class);
        return $this->belongsToMany(Benefit::class, 'benefits_proposals');
    }

    /**
     * The campaigns that belong to the proposal.
     */
    public function campaigns()
    {
        // return $this->belongsToMany(Benefit::class);
        return $this->belongsToMany(Campaign::class, 'campaigns_proposals');
    }

    /**
     * The financings that belong to the proposal.
     */
    public function financings()
    {
        // return $this->belongsToMany(Benefit::class);
        return $this->belongsToMany(Financing::class, 'financing_proposals');
    }

}
