<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NcsJobNatureCode extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
      ];
    public function jobs()
    {
        return $this->hasMany(NcsJobDispatch::class, 'jobnatures');
    }
}
