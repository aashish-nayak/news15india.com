<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $fillable = [
        'user_id', 'option_id' , 'reference_type'
    ];
    protected $table = 'votes';

    public function option()
    {
        return $this->belongsTo(Option::class);
    }

    public function reference()
    {
        return $this->morphTo(__FUNCTION__,'reference_type','user_id');
    }
}
