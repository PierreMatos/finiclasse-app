<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class CarModel
 * @package App\Models
 * @version May 25, 2021, 10:00 pm UTC
 *
 * @property \App\Models\Make $make
 * @property \App\Models\CarCategory $carCategory
 * @property string $name
 * @property integer $make_id
 * @property integer $car_category_id
 */
class CarModel extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'car_models';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'make_id',
        'car_category_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'make_id' => 'integer',
        'car_category_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'make_id' => 'required',
        'car_category_id' => 'required'
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
    public function carCategory()
    {
        return $this->belongsTo(\App\Models\CarCategory::class, 'car_category_id', 'id');
    }
}
