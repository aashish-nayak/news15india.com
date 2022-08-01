<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class MenuNodes extends Model
{
    use HasFactory;

    protected $fillable = [
        'menu_id',
        'parent_id',
        'reference_id',
        'reference_type',
        'title',
        'url',
        'icon',
        'css',
        'target',
        'position',
        'has_child'
    ];

    public function parent(){
        return $this->belongsTo(MenuNodes::class, 'parent_id')->orderBy('position');
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
    
    public function reference()
    {
        // MorphTo function used to get relation with same table column and their relation id column
        return $this->morphTo(__FUNCTION__, 'reference_type', 'reference_id');
    }

    /**
     * @param string $value
     * @return string
     */
    public function getUrlAttribute($value)
    {
        if (!$this->reference_type) {
            return $value ? (string)$value : '/';
        }

        if (!$this->reference) {
            return '/';
        }

        return (string)$this->reference->url;
    }
}
