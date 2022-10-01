<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'payment_id',
        'user_id',
        'reference_id',
        'reference_type',
        'payment_type',
        'payment_method',
        'amount',
        'payment_status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function reference()
    {
        return $this->morphTo(__FUNCTION__,'reference_type','reference_id');
    }
}
