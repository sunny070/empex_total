<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhysicalChallenge extends Model
{
  use HasFactory;

  protected $fillable = [
    'name',
  ];

  // public function userPhysicalChallenge()
  // {
  //     return $this->hasOne(UserPhysicalChallenge::class, 'physically_challenge');
  // }

}
