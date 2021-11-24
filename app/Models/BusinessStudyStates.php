<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class BusinessStudyStates
 * @package App\Models
 * @version November 24, 2021, 11:33 pm UTC
 *
 * @property string $name
 * @property integer $order
 * @property string $color
 * @property boolean $visible
 */
class BusinessStudyStates extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'business_study_states';
    

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
