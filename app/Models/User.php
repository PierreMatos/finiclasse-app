<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

/**
 * Class User
 * @package App\Models
 * @version June 17, 2021, 9:21 am UTC
 *
 * @property \App\Models\Stand $stand
 * @property string $name
 * @property string $email
 * @property string $city
 * @property string $adress
 * @property string $zip_code
 * @property integer $phone
 * @property integer $mobile_phone
 * @property integer $nif
 * @property string $gdpr_confirmation
 * @property string $gdpr_rejection
 * @property string $gdpr_type
 * @property boolean $finiclasse_employee
 * @property integer $stand_id
 */
class User extends Authenticatable implements JWTSubject
{
    use SoftDeletes;
    use HasFactory;
    use Notifiable;

    public $table = 'users';
    

    protected $dates = ['deleted_at'];


    
    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }


    public $fillable = [
        'name',
        'email',
        'password',
        'city',
        'adress',
        'zip_code',
        'phone',
        'mobile_phone',
        'nif',
        'gdpr_confirmation',
        'gdpr_rejection',
        'gdpr_type',
        'finiclasse_employee',
        'stand_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'email' => 'string',
        'password' => 'string',
        'city' => 'string',
        'adress' => 'string',
        'zip_code' => 'string',
        'phone' => 'integer',
        'mobile_phone' => 'integer',
        'nif' => 'integer',
        'gdpr_type' => 'string',
        'finiclasse_employee' => 'boolean',
        'stand_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'validations:nullable',
        'email' => 'required',
        'email_verified_at' => 'validations:nullable',
        'password' => 'validations:nullable',
        'city' => 'validations:nullable',
        'adress' => 'validations:nullable',
        'zip_code' => 'validations:nullable',
        'phone' => 'validations:nullable',
        'mobile_phone' => 'validations:nullable',
        'nif' => 'validations:nullable',
        'gdpr_confirmation' => 'validations:nullable',
        'gdpr_rejection' => 'validations:nullable',
        'gdpr_type' => 'validations:nullable',
        'finiclasse_employee' => 'validations:nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function stand()
    {
        return $this->belongsTo(\App\Models\Stand::class, 'stand_id', 'id');
    }
}
