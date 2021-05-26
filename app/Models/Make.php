<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Make
 * @package App\Models
 * @version May 7, 2021, 2:29 pm UTC
 *
 * @property string $name
 * @property string $logo
 */
class Make extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'makes';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'logo'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'logo' => 'string'
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
