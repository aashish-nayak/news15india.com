<?php

namespace App\Http\Controllers;

use App\Classes\Guest;
use App\Models\Poll;
use Exception;
use Illuminate\Http\Request;

class VoteController extends Controller
{

    public function vote(Poll $poll, Request $request)
    {
        try{
            // dd($request->all());
            $vote = $this->resolveVoter($request, $poll)
                ->poll($poll)
                ->vote($request->get('options'));
            if($vote){
                return back()->with('success', 'Vote Done');
            }
        }catch (Exception $e){
            return back()->with('errors', $e->getMessage());
        }
    }

    protected function resolveVoter(Request $request, Poll $poll)
    {
        if($poll->canGuestVote()){
            return new Guest($request);
        }
        return $request->user(config('larapoll_config.user_guard','web'));
    }
}
