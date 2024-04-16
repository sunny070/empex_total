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

  public function userPhysicalChallenge()
  {
      return $this->hasMany(UserPhysicalChallenge::class, 'physical_challenge_id');
  }

}
