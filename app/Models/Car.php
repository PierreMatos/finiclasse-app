<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;


/**
 * Class Car
 * @package App\Models
 * @version June 16, 2021, 11:28 am UTC
 *
 * @property \App\Models\CarModel $model
 * @property \App\Models\CarCategory $category
 * @property \App\Models\CarCondition $condition
 * @property \App\Models\CarState $state
 * @property \App\Models\Stand $stand
 * @property \App\Models\CarTransmission $transmission
 * @property \App\Models\CarDrive $drive
 * @property \App\Models\CarFuel $fuel
 * @property \App\Models\CarClass $class
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
 * @property integer $stand_id
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
 * @property integer $transmission_id
 * @property string $color_interior
 * @property string $color_exterior
 * @property boolean $metallic_color
 * @property integer $drive_id
 * @property integer $fuel_id
 * @property integer $door
 * @property integer $seats
 * @property integer $class_id
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
 * @property integer $extras_total
 * @property integer $sub_total
 * @property integer $total_benefits
 * @property integer $selling_price
 * @property integer $buying_price
 * @property integer $iva
 * @property integer $isv
 * @property integer $ptl
 * @property integer $sigpu
 * @property string $equipment
 */
class Car extends Model implements HasMedia
{
    use SoftDeletes;
    use InteractsWithMedia;
    use HasFactory;

    public $table = 'cars';
    

    protected $dates = ['deleted_at'];
    protected $touches = ['proposal'];

    public $fillable = [
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
        'fuel_id',
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
        'consumption',
        'extras_total',
        'sub_total',
        'selling_price',
        'buying_price',
        'ptl',
        'sigpu',
        'iva',
        'isv',
        'equipment',
        'observations',
        'est'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
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
        'stand_id' => 'integer',
        'price' => 'float',
        'price_base' => 'float',
        'price_new' => 'float',
        'price_campaign' => 'float',
        'tradein' => 'boolean',
        'tradein_purchase' => 'integer',
        'tradein_sale' => 'integer',
        'felxible' => 'boolean',
        'deductible' => 'boolean',
        'power' => 'integer',
        'km' => 'integer',
        'transmission_id' => 'integer',
        'color_interior' => 'string',
        'color_exterior' => 'string',
        'metallic_color' => 'boolean',
        'drive_id' => 'integer',
        'fuel_id' => 'integer',
        'door' => 'integer',
        'seats' => 'integer',
        'class_id' => 'integer',
        'autonomy' => 'integer',
        'emissions' => 'float',
        'iuc' => 'float',
        'registration_count' => 'integer',
        'order_date' => 'datetime',
        'arrival_date' => 'datetime',
        'delivery_date' => 'datetime',
        'chassi_number' => 'integer',
        'iuc_expiration_date' => 'datetime',
        'inspection_expiration_date' => 'datetime',
        'tradein_observations' => 'string',
        'consumption' => 'float',
        'extras_total' => 'float',
        'sub_total' => 'float',
        'selling_price' => 'float',
        'buying_price' => 'float',
        'iva' => 'integer',
        'isv' => 'float',
        'ptl' => 'float',
        'sigpu' => 'float',
        'equipment' => 'string',
        'observations' => 'string',
        'est' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        /*
        'motorization' => 'required',
        'category_id' => 'required',
        'condition_id' => 'required',
        'state_id' => 'required',
        'model_id' => 'required',
        */
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function model()
    {
        return $this->belongsTo(\App\Models\CarModel::class, 'model_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function category()
    {
        return $this->belongsTo(\App\Models\CarCategory::class, 'category_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function condition()
    {
        return $this->belongsTo(\App\Models\CarCondition::class, 'condition_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function state()
    {
        return $this->belongsTo(\App\Models\CarState::class, 'state_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function stand()
    {
        return $this->belongsTo(\App\Models\Stand::class, 'stand_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function transmission()
    {
        return $this->belongsTo(\App\Models\CarTransmission::class, 'transmission_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function drive()
    {
        return $this->belongsTo(\App\Models\CarDrive::class, 'drive_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function fuel()
    {
        return $this->belongsTo(\App\Models\CarFuel::class, 'fuel_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function class()
    {
        return $this->belongsTo(\App\Models\CarClass::class, 'class_id', 'id');
    }

    /**
     * Get the proposal that the car belongs to.
     */
    public function proposal()
    {
        // dd('hey');
        return $this->belongsTo(\App\Models\Proposal::class, 'id', 'car_id');
    }

    // CREATE THUMBNAIL
    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
              ->width(368)
              ->height(232)
              ->sharpen(10);
    }

}
