<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class BusinessStudy
 * @package App\Models
 * @version May 26, 2021, 9:15 pm UTC
 *
 * @property \App\Models\BusinessStudyAuthorization $businessStudyAuthorization
 * @property \App\Models\Car $tradein
 * @property integer $client_id
 * @property integer $car_id
 * @property integer $extras_total
 * @property integer $sub_total
 * @property integer $total_benefits
 * @property integer $selling_price
 * @property integer $tradein_id
 * @property integer $tradein_diff
 * @property integer $settle_amount
 * @property integer $total_diff_amount
 * @property integer $total_discount_amount
 * @property integer $total_discount_perc
 * @property integer $iva
 * @property integer $isv
 * @property integer $business_study_authorization_id
 * @property integer $tradein_id
 */
class BusinessStudy extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'business_studies';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'client_id',
        'car_id',
        'id',
        'extras_total',
        'extras_total2',
        'sub_total',
        'total_benefits',
        'selling_price',
        'base_price',
        'tradein_id',
        'tradein_diff',
        'settle_amount',
        'total_diff_amount',
        'total_discount_amount',
        'total_discount_perc',
        'iva',
        'ivatx',
        'isv',
        'sigpu',
        'ptl',
        'sale',
        'total',
        'expenses',
        'taxes',
        'warranty',
        'purchase_price',
        'business_study_authorization_id',
        'tradein_id',
        'total_transf'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'client_id' => 'integer',
        'car_id' => 'integer',
        'extras_total' => 'decimal:2',
        'extras_total2' => 'decimal:2',
        'sub_total' => 'decimal:2',
        'total_benefits' => 'decimal:2',
        'selling_price' => 'decimal:2',
        'base_price' => 'decimal:2',
        'tradein_diff' => 'decimal:2',
        'settle_amount' => 'decimal:2',
        'total_diff_amount' => 'decimal:2',
        'total_discount_amount' => 'decimal:2',
        'total_discount_perc' => 'float',
        'iva' => 'decimal:2',
        'ivatx' => 'decimal:2',
        'isv' => 'decimal:2',
        'sigpu' => 'decimal:2',
        'ptl' => 'decimal:2',
        'sale' => 'decimal:2',
        'total' => 'decimal:2',
        'expenses' => 'decimal:2',
        'taxes' => 'decimal:2',
        'warranty' => 'decimal:2',
        'purchase_price' => 'decimal:2',
        'business_study_authorization_id' => 'integer',
        'tradein_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        // 'client_id' => 'required',
        // 'car_id' => 'required',
        // 'business_study_authorization_id' => 'required',
        // 'tradein_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function businessStudyAuthorization()
    {
        return $this->belongsTo(\App\Models\BusinessStudyAuthorization::class, 'business_study_authorization_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function tradein()
    {
        return $this->belongsTo(\App\Models\Car::class, 'tradein_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function initialProposal()
    {
        return $this->hasOne(\App\Models\Proposal::class, 'initial_business_study_id' , 'id');
    }

}
