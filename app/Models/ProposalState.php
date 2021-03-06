<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class ProposalState
 * @package App\Models
 * @version May 26, 2021, 9:06 pm UTC
 *
 * @property string $name
 * @property integer $order
 * @property string $color
 * @property boolean $visible
 */
class ProposalState extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'proposal_states';
    

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
