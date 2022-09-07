<?php


namespace App\Traits\Poll;


use Illuminate\Support\Facades\DB;
use App\Exceptions\PollNotSelectedToVoteException;
use App\Exceptions\VoteInClosedPollException;
use App\Classes\Guest;
use App\Models\Option;
use App\Models\Poll;
use App\Models\Visitor;
use App\Models\Vote;
use InvalidArgumentException;
use League\CommonMark\Reference\Reference;

trait Voter
{
    protected $poll;

    /**
     * Select poll
     *
     * @param Poll $poll
     * @return $this
     */
    public function poll(Poll $poll)
    {
        $this->poll = $poll;

        return $this;
    }

    /**
     * Vote for an option
     *
     * @param $options
     * @return bool
     * @throws PollNotSelectedToVoteException
     * @throws VoteInClosedPollException
     * @throws \Exception
     */
    public function vote($options)
    {
        $options = is_array($options) ? $options : func_get_args();
        // if poll not selected
        if (is_null($this->poll))
            throw new PollNotSelectedToVoteException();

        if ($this->poll->isLocked() || $this->poll->hasEnded())
            throw new VoteInClosedPollException();

        if ($this->hasVoted($this->poll->id))
            throw new \Exception("User can not vote again!");

        // if is Radio and voted for many options
        $countVotes = count($options);

        if ($this->poll->isRadio() && $countVotes > 1)
            throw new InvalidArgumentException("The poll can not accept many votes option");

        if ($this->poll->isCheckable() &&  $countVotes > $this->poll->maxCheck)
            throw new InvalidArgumentException("selected more options {$countVotes} than the limited {$this->poll->maxCheck}");

        array_walk($options, function (&$val) {
            if (!is_numeric($val))
                throw new InvalidArgumentException("Only id are accepted");
        });
        if ($this instanceof Guest) {
            collect($options)->each(function ($option){
                Vote::create([
                    'user_id' => $this->user_id,
                    'reference_type'=>$this->reference,
                    'option_id' => $option
                ]);
            });

            return true;
        }
        return !is_null($this->options()->sync($options, false)['attached']);
    }

    /**
     * Check if he can vote
     *
     * @param $poll_id
     * @return bool
     */
    public function hasVoted($poll_id)
    {
        $poll = Poll::findOrFail($poll_id);

        if ($poll->canGuestVote()) {
            if(auth('web')->check() == true){
                $user = auth('web')->user();
            }else{
                $user = Visitor::where('ip',request()->ip())->where('user_id',NULL)->first();
            }
            $result = DB::table('polls')
            ->selectRaw('count(*) As total')
            ->join('options', 'polls.id', '=', 'options.poll_id')
                ->join('votes', 'votes.option_id', '=', 'options.id')
                ->where('votes.user_id', $user->id)
                ->where('votes.reference_type', get_class($user))
                ->where('options.poll_id', $poll_id)->count();
            return $result !== 0;
        }

        return $this->options()->where('poll_id', $poll->id)->count() !== 0;
    }

    /**
     * The options he voted to
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function options()
    {
        return $this->belongsToMany(Option::class, Vote::class,'user_id','option_id')->withTimestamps();
    }
}
