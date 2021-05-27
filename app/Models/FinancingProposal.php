<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class FinancingProposal
 * @package App\Models
 * @version May 27, 2021, 1:15 pm UTC
 *
 * @property \App\Models\Financing $financing
 * @property \App\Models\Proposal $proposal
 * @property string $name
 * @property string $description
 * @property integer $value
 * @property string $document
 * @property integer $financing_id
 * @property integer $proposal_id
 */
class FinancingProposal extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'financing_proposals';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'description',
        'value',
        'document',
        'financing_id',
        'proposal_id'
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
        'value' => 'integer',
        'document' => 'string',
        'financing_id' => 'integer',
        'proposal_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'description' => 'required',
        'value' => 'required',
        'financing_id' => 'required',
        'proposal_id' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function financing()
    {
        return $this->belongsTo(\App\Models\Financing::class, 'financing_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function proposal()
    {
        return $this->belongsTo(\App\Models\Proposal::class, 'proposal_id', 'id');
    }
}
