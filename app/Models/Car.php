<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Car
 * @package App\Models
 * @version May 26, 2021, 10:58 am UTC
 *
 * @property integer $make_id
 * @property integer $model_id
 * @property string $variant
 * @property integer $motorization
 * @property integer $category_id
 * @property string $registration
 * @property integer $condition_id
 * @property integer $state_id
 * @property integer $komm
 * @property integer $warranty_stand
 * @property integer $warranty_make
 * @property string $plate
 * @property string $stand_id
 * @property integer $price
 * @property integer $price_base
 * @property integer $price_new
 * @property integer $price_campaign
 * @property boolean $tradein
 * @property integer $tradein_purchase
 * @property integer $tradein_sale
 * @property boolean $felxible
 * @property boolean $deductible
 * @property integer $power
 * @property integer $km
 * @property string $transmission_id
 * @property string $color_interior
 * @property string $color_exterior
 * @property boolean $metallic_color
 * @property string $drive_id
 * @property integer $door
 * @property integer $seats
 * @property string $class_id
 * @property integer $autonomy
 * @property integer $emissions
 * @property integer $iuc
 * @property integer $registration_count
 * @property string $order_date
 * @property string $arrival_date
 * @property string $delivery_date
 * @property integer $chassi_number
 * @property string $iuc_expiration_date
 * @property string $inspection_expiration_date
 * @property string $tradein_observations
 * @property integer $consumption
 */
class Car extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'cars';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'make_id',
        'model_id',
        'variant',
        'motorization',
        'category_id',
        'registration',
        'condition_id',
        'state_id',
        'komm',
        'warranty_stand',
        'warranty_make',
        'plate',
        'stand_id',
        'price',
        'price_base',
        'price_new',
        'price_campaign',
        'tradein',
        'tradein_purchase',
        'tradein_sale',
        'felxible',
        'deductible',
        'power',
        'km',
        'transmission_id',
        'color_interior',
        'color_exterior',
        'metallic_color',
        'drive_id',
        'door',
        'seats',
        'class_id',
        'autonomy',
        'emissions',
        'iuc',
        'registration_count',
        'order_date',
        'arrival_date',
        'delivery_date',
        'chassi_number',
        'iuc_expiration_date',
        'inspection_expiration_date',
        'tradein_observations',
        'consumption'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'make_id' => 'integer',
        'model_id' => 'integer',
        'variant' => 'string',
        'motorization' => 'integer',
        'category_id' => 'integer',
        'registration' => 'datetime',
        'condition_id' => 'integer',
        'state_id' => 'integer',
        'komm' => 'integer',
        'warranty_stand' => 'integer',
        'warranty_make' => 'integer',
        'plate' => 'string',
        'stand_id' => 'string',
        'price' => 'integer',
        'price_base' => 'integer',
        'price_new' => 'integer',
        'price_campaign' => 'integer',
        'tradein' => 'boolean',
        'tradein_purchase' => 'integer',
        'tradein_sale' => 'integer',
        'felxible' => 'boolean',
        'deductible' => 'boolean',
        'power' => 'integer',
        'km' => 'integer',
        'transmission_id' => 'string',
        'color_interior' => 'string',
        'color_exterior' => 'string',
        'metallic_color' => 'boolean',
        'drive_id' => 'string',
        'door' => 'integer',
        'seats' => 'integer',
        'class_id' => 'string',
        'autonomy' => 'integer',
        'emissions' => 'integer',
        'iuc' => 'integer',
        'registration_count' => 'integer',
        'order_date' => 'datetime',
        'arrival_date' => 'datetime',
        'delivery_date' => 'datetime',
        'chassi_number' => 'integer',
        'iuc_expiration_date' => 'datetime',
        'inspection_expiration_date' => 'datetime',
        'tradein_observations' => 'string',
        'consumption' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'make_id' => 'required',
        'variant' => 'required',
        'motorization' => 'required',
        'category_id' => 'required',
        'condition_id' => 'required',
        'state_id' => 'required'
    ];

    
}
