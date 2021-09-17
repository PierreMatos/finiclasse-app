<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeadUser extends Model
{
    use HasFactory;

    protected $table = "leads_users";

    protected $fillable = ['client_id', 'vendor_id'];

    public function vendor()
    {
        return $this->belongsTo(User::class);
    }
}
