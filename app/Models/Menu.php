<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class Menu extends Model
{
    use HasFactory;
    protected $fillable = ['menu_location_id','name','slug','status'];
        
    public function setNameAttribute($value){
        $this->attributes['name'] = ucwords($value);
        $this->attributes['slug'] = Str::slug($value);
    }

    public function parentMenuNodes()
    {
        return $this->hasMany(MenuNodes::class,'menu_id')->where('parent_id',0)->orderBy('position');
    }
}
