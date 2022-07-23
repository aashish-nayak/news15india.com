<?php

namespace App\Models;

use App\Traits\LoremImageTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory,LoremImageTrait;
    
    protected $fillable = [
        'img',
        'alt',
        'size',
        'type',
        'dimension'
    ];
}
