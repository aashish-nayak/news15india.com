<?php

namespace App\Models;

use App\Traits\Poll\PollAccessor;
use App\Traits\Poll\PollCreator;
use App\Traits\Poll\PollManipulator;
use App\Traits\Poll\PollQueries;
use Illuminate\Database\Eloquent\Model;

class Poll extends Model
{
    use PollCreator, PollAccessor, PollManipulator, PollQueries;

    protected $fillable = ['question', 'image', 'canVisitorsVote', 'canVoterSeeResult','organized_by'];

    protected $table = 'polls';

    protected $guarded = [''];

    /**
     * A poll has many options related to
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function options()
    {
        return $this->hasMany(Option::class);
    }

    /**
     * Boot Method
     *
     */
    public static function boot()
    {
        parent::boot();
        static::deleting(function ($poll) {
            $poll->options->each(function ($option) {
                Vote::where('option_id', $option->id)->delete();
            });
            $poll->options()->delete();
        });
    }

    /**
     * Get all of the votes for the poll.
     */
    public function votes()
    {
        return $this->hasManyThrough(Vote::class, Option::class);
    }

    /**
     * Check if the Guest has the right to vote
     *
     * @return bool
     */
    public function canGuestVote()
    {
        return $this->canVisitorsVote === 1;
    }

    /**
     * Check if the user can change options
     *
     * @return bool
     */
    public function canChangeOptions()
    {
        return $this->votes()->count() === 0;
    }

    public function pollImage(){
        return $this->belongsTo(Media::class, 'image');
    }
}
