<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    public function job()
    {
        return $this->hasMany(JobPost::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}