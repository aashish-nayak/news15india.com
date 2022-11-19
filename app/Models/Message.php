<?php

namespace App\Models;

use App\Traits\Messaging;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory, Messaging;
    protected $fillable = ['receiver_id','sender_id','message'];

    public function user(){
        return $this->belongsTo(Admin::class);
    }
}
