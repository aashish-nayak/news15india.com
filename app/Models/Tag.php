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
        'meta_keyword',
        'meta_description',
        'status'
    ];

    public function news(){
        return $this->belongsToMany(News::class,'news_tag');
    }

    public function img(){
        return $this->belongsTo(Media::class, 'tag_img');
    }
}
