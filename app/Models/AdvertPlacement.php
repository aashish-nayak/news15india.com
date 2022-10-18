<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdvertPlacement extends Model
{
    use HasFactory;
    
    protected $fillable = ['group_name','name','slug','width','height','price','status'];
}
