<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

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
        'status',
    ];
    
    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::slug($value);
    }

    public function news()
    {
        return $this->belongsToMany(News::class, 'news_tag')->whereHas('creator',function($query){
            if(isset($query->name)){
                return $query;
            }
        })->where('is_published', 1)->where('is_verified', 1)->where('status', 1);
    }

    public function tagImage()
    {
        return $this->belongsTo(Media::class, 'tag_img')->withDefault([
            'filename' => 'https://eu.ui-avatars.com/api/?name='.$this->name.'&size=250',
            'alt' => $this->name,
            'size' => '250',
            'type' => 'image/jpg',
            'dimension' => '250x250',
        ]);
    }
}
