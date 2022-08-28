<?php

namespace App\Helpers;

use Exception;
use App\Exceptions\CheckedOptionsException;
use App\Exceptions\OptionsInvalidNumberProvidedException;
use App\Exceptions\OptionsNotProvidedException;
use App\Exceptions\RemoveVotedOptionException;
use App\Models\Option;
use App\Models\Poll;
use InvalidArgumentException;

class PollHandler
{

    /**
     * Create a Poll from Request
     *
     * @param $request
     * @return Poll
     * @throws CheckedOptionsException
     * @throws OptionsInvalidNumberProvidedException
     * @throws OptionsNotProvidedException
     */
    public static function createFromRequest($request)
    {

        $poll = new Poll([
            'question' => $request['question'],
            'image' => $request['image'],
            'organized_by' => $request['organized_by'],
        ]);

        $poll->addOptions($request['options']);

        if (array_key_exists('maxCheck', $request)) {
            $poll->maxSelection($request['maxCheck']);
        }

        $poll->startsAt($request['starts_at']);

        if(isset($request['ends_at'])){
            $poll->endsAt($request['ends_at']);
        }

        if (isset($request['canVisitorsVote'])) {
            $poll->canVisitorsVote = $request['canVisitorsVote'];
        }elseif(!isset($request['canVisitorsVote'])){
            $poll->canVisitorsVote = 0;
        }

        // change see result value
        if (isset($request['canVoterSeeResult'])) {
            $poll->canVoterSeeResult = $request['canVoterSeeResult'];
        }elseif(!isset($request['canVoterSeeResult'])){
            $poll->canVoterSeeResult = 0;
        }

        $poll->generate();

        return $poll;
    }

    /**
     * Modify The poll
     *
     * @param Poll $poll
     * @param $data
     */
    public static function modify(Poll $poll, $data)
    {
        if($poll->canChangeOptions()){
            $poll->options()->delete();
            collect($data['options'])->each(function ($option) use($poll){
                Option::create([
                    'name' => $option,
                    'poll_id' => $poll->id,
                    'votes' => 0
                ]);
            });
        }

        if (isset($data['count_check'])) {
            if ($data['count_check'] < $poll->options()->count()) {
                $poll->canSelect($data['count_check']);
            }
        }

        // change the ability to vote by the guests
        if (isset($data['canVisitorsVote'])) {
            $poll->canVisitorsVote = $data['canVisitorsVote'];
        }elseif(!isset($data['canVisitorsVote'])){
            $poll->canVisitorsVote = 0;
        }

        // change see result value
        if (isset($data['canVoterSeeResult'])) {
            $poll->canVoterSeeResult = $data['canVoterSeeResult'];
        }elseif(!isset($data['canVoterSeeResult'])){
            $poll->canVoterSeeResult = 0;
        }

        $poll->question = $data['question'];
        $poll->image = $data['image'];
        $poll->organized_by = $data['organized_by'];

        if(isset($data['ends_at'])){
            $poll->endsAt($data['ends_at']);
        }

        $poll->startsAt($data['starts_at'])
            ->save();
    }

    /**
     * Get Messages
     *
     * @param Exception $e
     * @return string
     */
    public static function getMessage(Exception $e)
    {
        if ($e instanceof OptionsInvalidNumberProvidedException || $e instanceof OptionsNotProvidedException)
            return 'A poll should have two options at least';
        if ($e instanceof RemoveVotedOptionException)
            return 'You can not remove an option that has a vote';
        if ($e instanceof CheckedOptionsException)
            return 'You should edit the number of checkable options first.';

        if ($e instanceof  InvalidArgumentException) {
            return $e->getMessage();
        }
    }
}
