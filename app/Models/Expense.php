<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_name',
        'amount',
        'date',
        'account_category_id',
        'bank_account_id',
        'description',
        'receipt',
    ];

    public function category()
    {
        return $this->belongsTo(AccountCategory::class,'account_category_id');
    }

    public function account()
    {
        return $this->belongsTo(BankAccount::class,'bank_account_id');
    }
}
