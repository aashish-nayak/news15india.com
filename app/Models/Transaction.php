<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'reference_id',
        'reference_type',
        'reason',
        'date',
        'type',
        'bank_account_id',
        'amount',
        'status',
    ];

    public function reference()
    {
        return $this->morphTo(__FUNCTION__,'reference_type','reference_id');
    }

    public function bankAccount()
    {
        return $this->belongsTo(BankAccount::class,'bank_account_id');
    }
}
