<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
    ];

    protected $fillable = [
        'transactionId',
        'orderId',
        'status',
        'user_id',
        'created_at'
    ];

    // Define the relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
      }

    
    
      public static function searchPost($search)
    {
        return empty($search) ? static::query()
            : static::query()
                ->where('transactionId', 'like', '%' . $search . '%')
                ->orWhere('orderId', 'like', '%' . $search . '%')
                ->orWhere('status', 'like', '%' . $search . '%')
                ->orWhere('created_at', 'like', '%' . $search . '%')

                ->orWhereHas('user', function ($query) use ($search) {
                    $query->where('name', 'like', '%' . $search . '%');
                });
    }
}
