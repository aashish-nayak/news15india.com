<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'admin_id',
        'url',
        'avatar_id',
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
        'currency',
    ];

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

    public function avatar()
    {
        return $this->belongsTo(Media::class,'avatar_id');
    }
}
