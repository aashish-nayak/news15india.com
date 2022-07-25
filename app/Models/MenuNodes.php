<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuNodes extends Model
{
    use HasFactory;

    public function parent(){
        return $this->belongsTo(MenuNodes::class, 'parent_id');
    }

    public function child(){
        return $this->hasMany(MenuNodes::class, 'parent_id')->orderBy('position');
    }

    public function nested_parent(){
        return $this->parent()->with('nested_parent');
    }

    public function nested_child(){
        return $this->children()->with('nested_child');
    }
}
