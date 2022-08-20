<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
    use HasFactory;
    
    protected $fillable = ['staticable_type','staticable_id','views','editable_views','likes','dislikes','json_data'];

    public function staticable()
    {
        // MorphTo function used to get relation with same table column and their relation id column
        return $this->morphTo(__FUNCTION__, 'staticable_type', 'staticable_id');
    }
}
