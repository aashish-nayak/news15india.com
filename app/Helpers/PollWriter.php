<?php

namespace App\Helpers;

use App\Classes\Guest;
use App\Models\Poll;
use App\Traits\Poll\PollWriterResults;
use App\Traits\Poll\PollWriterVoting;

class PollWriter
{
    use PollWriterResults,
        PollWriterVoting;

    /**
     * Draw a Poll
     *
     * @param Poll $poll
     * @return string
     */
    public function draw($poll)
    {
        if(is_int($poll)){
            $poll = Poll::findOrFail($poll);
        }

        if(!$poll instanceof Poll){
            throw new \InvalidArgumentException("The argument must be an integer or an instance of Poll");
        }

        if ($poll->isComingSoon()) {
            return 'To start soon';
        }


        $voter = $poll->canGuestVote() ? new Guest(request()) : auth(config('larapoll_config.user_guard'))->user();
        if (is_null($voter) || $voter->hasVoted($poll->id) || $poll->isLocked() || $poll->hasEnded()) {
            if (!$poll->showResultsEnabled()) {
                return 'Thanks for voting';
            }
            return $this->drawResult($poll);
        }
        if ($poll->isRadio()) {
            return $this->drawRadio($poll);
        }
        return $this->drawCheckbox($poll);
    }
}
