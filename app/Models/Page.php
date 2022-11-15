<?php

namespace App\Models;

use App\Traits\Staticable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Page extends Model
{
    use HasFactory, Staticable;

    protected $fillable = [
        'name',
        'slug',
        'content',
        'image',
        'admin_id',
        'template',
        'status',
        'meta_title',
        'meta_keywords',
        'meta_description',
    ];

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::slug($value);
    }

    public function pageImage()
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
}
