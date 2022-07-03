<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class Role extends Model
{
    use HasFactory;
    protected $fillable = ['name','slug'];
    
    public function setSlugAttribute($value){
        $this->attributes['slug'] = Str::slug($value);
    }

    public function setNameAttribute($value){
        $this->attributes['name'] = ucwords($value);
    }
    
    public function permissions(){
        return $this->belongsToMany(Permission::class,'role_permissions','role_id','permission_id');
    }

    public function users(){
        return $this->belongsToMany(Admin::class,'admin_roles','admins','id');
    }
}
