<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class ProfitMargin
 * @package App\Models
 * @version September 27, 2022, 11:50 am WEST
 *
 * @property integer $make_id
 * @property integer $car_fuel_id
 * @property integer $car_category_id
 * @property integer $level_1
 * @property integer $level_2
 * @property integer $level_3
 */
class ProfitMargin extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'profit_margins';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'make_id',
        'car_fuel_id',
        'car_category_id',
        'level_1',
        'level_2',
        'level_3'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'make_id' => 'integer',
        'car_fuel_id' => 'integer',
        'car_category_id' => 'integer',
        'level_1' => 'integer',
        'level_2' => 'integer',
        'level_3' => 'integer'
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
    public function make()
    {
        return $this->belongsTo(\App\Models\Make::class, 'make_id', 'id');
    }

        /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function fuel()
    {
        return $this->belongsTo(\App\Models\CarFuel::class, 'car_fuel_id', 'id');
    }

        /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function category()
    {
        return $this->belongsTo(\App\Models\CarCategory::class, 'car_category_id', 'id');
    }
}
