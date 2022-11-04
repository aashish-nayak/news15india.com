<?php

namespace App\Models;

use App\Traits\Commentable;
use App\Traits\Staticable;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class News extends Model
{
    use HasFactory, SoftDeletes, Commentable, Staticable;
    protected $fillable = [
        'title',
        'slug',
        'short_description',
        'admin_id',
        'content',
        'is_published',
        'status',
        'is_verified',
        'page_order',
        'image',
        'format',
        'youtube_url',
        'is_featured',
        'meta_title',
        'meta_keywords',
        'meta_description'
    ];
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'news_categories');
    }
    public function newsImage()
    {
        return $this->belongsTo(Media::class, 'image')->withDefault([
            'filename' => 'https://eu.ui-avatars.com/api/?name=News15India&size=250',
            'alt' => 'News15India',
            'size' => '250',
            'type' => 'image/jpg',
            'dimension' => '250x250',
        ]);
    }
    public function creator()
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'news_tag');
    }
}
