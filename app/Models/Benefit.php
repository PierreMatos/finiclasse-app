<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Benefit
 * @package App\Models
 * @version May 26, 2021, 9:07 pm UTC
 *
 * @property string $name
 * @property string $type
 * @property integer $amount
 */
class Benefit extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'benefits';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'type',
        'amount'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'type' => 'string',
        'amount' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'type' => 'required'
    ];

    
}
