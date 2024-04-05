<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NcsMinQualification extends Model
{
    use HasFactory;
    public function jobs()
    {
        return $this->hasMany(NcsJobDispatch::class, 'qualifications');
    }
}
