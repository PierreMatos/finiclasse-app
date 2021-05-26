<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class CarTransmission
 * @package App\Models
 * @version May 8, 2021, 11:31 am UTC
 *
 * @property string $name
 * @property integer $order
 * @property string $color
 * @property boolean $visible
 */
class CarTransmission extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'car_transmissions';
    

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
