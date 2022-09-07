<?php

namespace App\Models;

use App\Traits\Poll\Voter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use function PHPUnit\Framework\returnSelf;

class Visitor extends Model
{
    use HasFactory,Voter;
    protected $fillable = ['user_id','ip','country','clicks'];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function user_stats()
    {
        return $this->belongsToMany(Statistic::class,'statistic_visitor');
    }
}
