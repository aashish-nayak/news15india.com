<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'tag_img',
        'meta_title',
        'meta_keywords',
        'meta_description',
        'status'
    ];

    public function news(){
        return $this->belongsToMany(News::class,'news_tag')->where('is_published',1)->where('is_verified',1)->where('status',1);
    }

    public function tagImage(){
        return $this->belongsTo(Media::class, 'tag_img');
    }
}
