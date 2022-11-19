<?php

namespace App\Traits;

use App\Models\Message;

trait Messageable
{
    public function messages(){
        return $this->hasMany(Message::class,'sender_id');
    }

}