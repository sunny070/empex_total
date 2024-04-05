<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RegisteringAuthority extends Model
{
    use HasFactory,SoftDeletes;

    public function district()
    {
        return $this->belongsToMany(District::class, 'registering_authority_districts');
    }
}
