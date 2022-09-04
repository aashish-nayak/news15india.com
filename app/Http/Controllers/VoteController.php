<?php

namespace App\Http\Controllers;

use App\Classes\Guest;
use App\Models\Poll;
use App\Models\Visitor;
use Exception;
use Illuminate\Http\Request;

class VoteController extends Controller
{

    public function vote(Poll $poll, Request $request)
    {
        try{
            $vote = $this->resolveVoter($request, $poll)
            ->poll($poll)
            ->vote($request->get('options'));
            if($vote){
                return redirect()->back()->with('success', 'Vote Done');
            }
        }catch (Exception $e){
            return redirect()->back()->with('errors', $e->getMessage());
        }
    }

    protected function resolveVoter(Request $request, Poll $poll)
    {
        if($poll->canGuestVote() && auth('web')->check() != true){
            $ip = new Guest($request);
            $visitor = Visitor::where('ip',$ip->user_id)->where('user_id',null);
            if($visitor->count() == 0){
                $visitor = Visitor::create([
                    'ip'=>$ip->user_id
                ]);
                $ip->user_id = $visitor->id;
                return $ip;
            }
            $visitor = $visitor->first();
            $ip->user_id = $visitor->id;
            $ip->reference = get_class($visitor);
            return $ip;
        }
        return $request->user(config('larapoll_config.user_guard','web'));
    }
}
