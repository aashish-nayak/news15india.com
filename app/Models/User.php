<?php

namespace App\Models;

use App\Traits\Commenter;
use App\Traits\Follower;
use App\Traits\Poll\Voter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, Commenter, Follower, Voter;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getAvatar()
    {
        $avatar = $this->details->avatar;
        if (Storage::exists('public/users-avatar/' . $avatar)) {
            $avatar = asset('storage/users-avatar/' . $avatar);
        } else {
            $avatar = 'https://eu.ui-avatars.com/api/?name=' . $this->name . '&size=250';
        }
        return $avatar;
    }
    
    public function details()
    {
        $city = City::where('state_id',33)->inRandomOrder()->first()->id;
        return $this->hasOne(UserDetail::class,'user_id')->withDefault([
            'country_id' => 101,
            'state_id' => 33,
            'city_id' => $city,
            'zip' => '000000',
            'address' => null,
            'avatar' => 'https://eu.ui-avatars.com/api/?name='.$this->name.'&size=250',
            'whatsapp_number' => null,
            'phone_number' => null,
            'created_at' => now()->toDateTimeString(),
            'updated_at' => now()->toDateTimeString(),
        ]);
    }

    public function user_ip()
    {
        if(Visitor::where('ip',request()->getClientIp())->where('user_id',null)->count() > 0){
            Visitor::where('ip',request()->getClientIp())->first()->update(['user_id'=>auth('web')->user()->id]);
        }
        return $this->hasOne(Visitor::class,'user_id');
    }

    public function complaints()
    {
        return $this->hasMany(Complaint::class);
    }
}
