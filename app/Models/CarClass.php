<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class CarClass
 * @package App\Models
 * @version September 2, 2021, 2:24 pm UTC
 *
 */
class CarClass extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'car_classes';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'order',
        'color',
        'visible'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'order' => 'integer',
        'color' => 'string',
        'visible' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required'
    ];
}
