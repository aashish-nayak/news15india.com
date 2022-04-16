<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class News extends Model
{
    use HasFactory, SoftDeletes;

    public function category()
    {
        return $this->belongsToMany(Category::class, 'category_news');
    }

    public function getCreatedAtAttribute(){
        return Carbon::createFromTimeStamp(strtotime($this->attributes['created_at']) )->diffForHumans();
    }
    public function img(){
        return $this->belongsTo(Media::class, 'image');
    }

    public function tags(){
        return $this->belongsToMany(Tag::class,'news_tag');
    }
}
