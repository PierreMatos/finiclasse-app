<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Stand
 * @package App\Models
 * @version May 7, 2021, 2:27 pm UTC
 *
 * @property string $name
 * @property string $localization
 * @property string $phone
 * @property string $email
 * @property integer $order
 * @property string $color
 * @property boolean $visible
 */
class Stand extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'stands';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'localization',
        'phone',
        'email',
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
        'localization' => 'string',
        'phone' => 'string',
        'email' => 'string',
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
