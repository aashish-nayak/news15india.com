<?php

namespace App\Models;

use App\Traits\LoremImageTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory,LoremImageTrait;
    
    protected $fillable = [
        'admin_id',
        'filename',
        'alt',
        'size',
        'type',
        'dimension'
    ];

    public function creator()
    {
        return $this->belongsTo(Admin::class,'admin_id');
    }
}
