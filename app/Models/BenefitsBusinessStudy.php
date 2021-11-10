<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class BenefitsBusinessStudy
 * @package App\Models
 * @version May 26, 2021, 9:15 pm UTC
 *
 * @property integer $benefits_id
 * @property integer $business_study_id
 */
class BenefitsBusinessStudy extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'benefits_business_studies';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'benefits_id',
        'business_study_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'benefits_id' => 'integer',
        'business_study_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'benefits_id' => 'required',
        'business_study_id' => 'required'
    ];

    
}
