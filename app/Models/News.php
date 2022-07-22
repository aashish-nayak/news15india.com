<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class News extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'title',
        'slug',
        'short_description',
        'user_id',
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
        return $this->belongsToMany(Category::class, 'category_news');
    }

    public function getCreatedAtAttribute(){
        return Carbon::createFromTimeStamp(strtotime($this->attributes['created_at']) )->diffForHumans();
    }
    public function img(){
        return $this->belongsTo(Media::class, 'image');
    }
    public function creator(){
        return $this->belongsTo(Admin::class, 'user_id');
    }
    public function tags(){
        return $this->belongsToMany(Tag::class,'news_tag');
    }
}
