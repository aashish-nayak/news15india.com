<?php

namespace App\Models;

use App\Traits\HasPermissionsTrait;
use App\Traits\Followable;
use Facade\FlareClient\Report;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Str;
class Admin extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasPermissionsTrait, SoftDeletes, Followable;

    protected $guard = "admin";
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

    public function news()
    {
        return $this->hasMany(News::class);
    }
    
    public function details()
    {
        $city = City::where('state_id',33)->inRandomOrder()->first()->id;
        return $this->hasOne(AdminDetail::class)->withDefault([
            'url' => strtolower(Str::random(20)),
            'country_id' => 101,
            'state_id' => 33,
            'city_id' => $city,
            'zip' => '000000',
            'address' => null,
            'avatar' => 'https://eu.ui-avatars.com/api/?name='.$this->name.'&size=250',
            'phone' => null,
            'created_at' => now()->toDateTimeString(),
            'updated_at' => now()->toDateTimeString(),
        ]);
    }

    public function reporter_details()
    {
        return $this->hasOne(Reporter::class,'admin_id')->withDefault([
            'country_id' => '',
            'state_id' => '',
            'city_id' => '',
            'zip' => '000000',
            'address' => null,
            'avatar' => 'https://eu.ui-avatars.com/api/?name='.$this->name.'&size=250',
            'phone' => null,
        ]);
    }

}
