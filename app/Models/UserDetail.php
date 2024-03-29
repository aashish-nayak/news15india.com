<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'country_id',
        'state_id',
        'city_id',
        'zip',
        'address',
        'avatar',
        'phone_number',
        'whatsapp_number',
        'gender',
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
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
