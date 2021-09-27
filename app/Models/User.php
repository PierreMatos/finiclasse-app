<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Spatie\Permission\Traits\HasRoles;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

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
 * @property integer $client_type_id
 * @property integer $service_car_id
 */
class User extends Authenticatable implements JWTSubject, HasMedia
{
    use SoftDeletes;
    use HasFactory;
    use Notifiable;
    use HasRoles;
    use InteractsWithMedia;


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
        'stand_id',
        'client_type_id',
        'service_car_id'
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
        'stand_id' => 'integer',
        'client_type_id' => 'integer',
        'service_car_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'email' => 'email|required',
        'email_verified_at' => 'nullable',
        'password' => 'nullable',
        'city' => 'nullable',
        'adress' => 'nullable',
        'zip_code' => 'nullable',
        'phone' => 'nullable',
        'mobile_phone' => 'nullable',
        'nif' => 'nullable',
        'gdpr_confirmation' => 'nullable',
        'gdpr_rejection' => 'nullable',
        'gdpr_type' => 'nullable',
        'finiclasse_employee' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function stand()
    {
        return $this->belongsTo(\App\Models\Stand::class, 'stand_id', 'id');
    }

    /**
     * Get all of the posts for the user.
     */
    public function leads()
    {
        return $this->belongsToMany(User::class, 'leads_users', 'vendor_id', 'client_id');
    }
    /**
     * Get all of the posts for the user.
     */
    public function vendor()
    {
        return $this->belongsToMany(User::class, 'leads_users', 'client_id', 'vendor_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function clientType()
    {
        return $this->belongsTo(\App\Models\ClientType::class, 'client_type_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function serviceCar()
    {
        return $this->belongsTo(\App\Models\Car::class, 'service_car_id', 'id');
    }
}
