<?php

namespace App\Traits;

use App\Models\Admin;

trait Messaging
{

    public function getCreatedAtAttribute($value)
    {
        return $this->created_at = date('D, h:iA',strtotime($value));
    }

    public function receiver()
    {
        return $this->belongsTo(Admin::class,'receiver_id','id');
    }

    public function sender()
    {
        return $this->belongsTo(Admin::class,'sender_id','id');
    }

}