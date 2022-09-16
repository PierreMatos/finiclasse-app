<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

/**
 * Class Campaign
 * @package App\Models
 * @version July 5, 2021, 5:31 pm UTC
 *
 * @property \App\Models\Make $make
 * @property \App\Models\CarModel $model
 * @property string $name
 * @property string $description
 * @property integer $make_id
 * @property integer $model_id
 * @property string $type
 * @property integer $amount
 * @property string $beginning
 * @property string $end
 */
class Campaign extends Model implements HasMedia
{
    use SoftDeletes;
    use InteractsWithMedia;
    use HasFactory;

    public $table = 'campaigns';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'description',
        'make_id',
        'model_id',
        'type',
        'amount',
        'beginning',
        'end'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'description' => 'string',
        'make_id' => 'integer',
        'model_id' => 'integer',
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
        'description' => 'required',
        'document' => 'nullable|mimes:pdf'
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
    public function model()
    {
        return $this->belongsTo(\App\Models\CarModel::class, 'model_id', 'id');
    }

}
