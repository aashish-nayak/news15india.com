<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class Permission extends Model
{
    use HasFactory;

    protected $fillable = ['name','slug'];

    public function setSlugAttribute($value){
        $this->attributes['slug'] = Str::slug($value);
    }

    public function setNameAttribute($value){
        $this->attributes['name'] = ucwords($value);
    }

    public function roles(){
        return $this->belongsToMany(Role::class,'role_permissions','permission_id','role_id');
    }

    public function users(){
        return $this->belongsToMany(Admin::class,'admin_permissions','admins','id');
    }
}
