<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class AdminDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'admin_id',
        'url',
        'avatar',
        'about',
        'facebook',
        'twitter',
        'instagram',
        'youtube',
        'linkedin',
        'website',
        'phone',
        'address',
        'country_id',
        'state_id',
        'city_id',
        'zip',
        'latitude',
        'longitude',
        'timezone',
        'language',
        'meta_title',
        'meta_keywords',
        'meta_description',
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class,'admin_id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

}
