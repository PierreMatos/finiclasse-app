<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class BusinessStudyAuthorization
 * @package App\Models
 * @version May 26, 2021, 9:11 pm UTC
 *
 * @property \App\Models\User $responsible
 * @property string $name
 * @property integer $min
 * @property integer $max
 * @property integer $responsible_id
 * @property string $color
 */
class BusinessStudyAuthorization extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'business_studies_authorizations';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'min',
        'max',
        'responsible_id',
        'color'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'min' => 'integer',
        'max' => 'integer',
        'responsible_id' => 'integer',
        'color' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'color' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function responsible()
    {
        return $this->belongsTo(\App\Models\User::class, 'responsible_id', 'id');
    }
}
