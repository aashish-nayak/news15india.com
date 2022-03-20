<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'cat_name',
        'slug',
        'cat_order',
        'location',
        'cat_img',
        'meta_title',
        'meta_keywords',
        'meta_desc',
        'status',
        'parent_id'
    ];

    public function getCreatedAtAttribute(){
        return Carbon::createFromTimeStamp(strtotime($this->attributes['created_at']) )->diffForHumans();
    }

    public function parent(){
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children(){
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function nested_parent(){
        return $this->parent()->with('nested_parent');
    }

    public function nested_child(){
        return $this->children()->with('nested_child');
    }

}
