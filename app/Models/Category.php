<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'cat_name',
        'slug',
        'cat_order',
        'cat_img',
        'meta_title',
        'meta_keywords',
        'meta_description',
        'status',
        'parent_id'
    ];

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::slug($value);
    }
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function nested_parent()
    {
        return $this->parent()->with('nested_parent');
    }

    public function nested_child()
    {
        return $this->children()->with('nested_child');
    }

    public function catImage()
    {
        return $this->belongsTo(Media::class, 'cat_img');
    }

    public function news()
    {
        return $this->belongsToMany(News::class, 'news_categories')->where('is_published', 1)->where('is_verified', 1)->where('status', 1);
    }
}
