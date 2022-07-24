<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class MenuLocation extends Model
{
    use HasFactory;

    protected $fillable = ['location'];

    public function setLocationAttribute($value){
        $this->attributes['location'] = Str::slug($value);
    }
}
