<?php

namespace App\Http\Controllers;

use App\Exceptions\DuplicatedOptionsException;
use App\Helpers\PollHandler;
use App\Http\Requests\PollCreationRequest;
use App\Models\Admin;
use App\Models\Poll;
use App\Models\User;
use Illuminate\Http\Request;
class PollController extends Controller
{

    public function home()
    {
        return redirect()->route('admin.poll.index');
    }

    public function index()
    {
        $polls = Poll::withCount('options', 'votes')->get()->map(function ($poll){
            $poll->isComingSoon = $poll->isComingSoon();
            $poll->isLocked = $poll->isLocked();
            $poll->isRunning = $poll->isRunning();
            $poll->hasEnded = $poll->hasEnded();
            $poll->delete_link = route('admin.poll.remove', $poll->id);
            $poll->users_link = route('admin.poll.users', $poll->id);
            return $poll;
        });
        $creators = Admin::get();
        return view('backpanel.poll.index', compact('polls','creators'));
    }


    public function store(PollCreationRequest $request)
    {
        try {
            PollHandler::createFromRequest($request->all());
        } catch (DuplicatedOptionsException $exception) {
            return redirect(route('admin.poll.index'))
                ->withInput($request->all())
                ->with('error', $exception->getMessage());
        }

        return redirect()->route('admin.poll.index')->with('success', 'Poll Created Successfully!');
    }

    public function view(Poll $poll,$innerClass = false)
    {
        $total = $poll->votes()->count();
        $results = $poll->results()->grab();
        $options = collect($results)->map(function ($result) use ($total){
                return (object) [
                    'votes' => $result['votes'],
                    'percent' => $total === 0 ? '0%' : ($result['votes'] / $total) * 100 . '%',
                    'name' => $result['option']->name,
                ];
        });
        $poll->options_result = $options;
        $poll->image_path = asset('storage/media/'.$poll->pollImage()->first()->filename);
        $poll->users_link = route('admin.poll.users', $poll->id);
        if($innerClass == true){
            return $poll;
        }
        return response()->json($poll);
    }

    public function update(PollCreationRequest $request)
    {
        try {
            $poll = Poll::find($request->id);
            PollHandler::modify($poll, $request->all());
            $poll_view = $this->view($poll,true);
            return response()->json(['status'=>'success','message'=>'Poll Updated Successfully!','poll'=>$poll_view]);
        } catch (\Exception $e) {
            return response()->json(['status'=>'error','message'=>$e->getMessage()]);
        }
    }

    public function remove(Poll $poll)
    {
        $poll->remove();
        return redirect()->back()->with('success','Poll Deleted Successfully!');
    }

    public function users(Poll $poll)
    {
        $users = collect();
        foreach ($poll->options as $key => $option) {
            if($option->voters->count()>0){
                foreach ($option->voters as $subkey => $voter) {
                    if($voter->reference != null){
                        $voter->reference->voted_option_id = $option->id;
                        $voter->reference->voted_to = $option->name;
                        $voter->reference->voted_created_at = $voter->created_at;
                        $users->push($voter->reference);
                    }
                }
            }
        }
        $users = $users->flatten();
        return view('backpanel.poll.user-poll',compact('poll','users'));
    }

    public function lock(Poll $poll)
    {
        $poll->lock();

        $poll->isComingSoon = $poll->isComingSoon();
        $poll->isLocked = $poll->isLocked();
        $poll->isRunning = $poll->isRunning();
        $poll->hasEnded = $poll->hasEnded();
        $poll->edit_link = route('admin.poll.edit', $poll->id);
        $poll->delete_link = route('admin.poll.remove', $poll->id);

        return response()->json([
            'poll' => $poll
        ], 200);
    }

    public function unlock(Poll $poll)
    {
        $poll->unLock();

        $poll->isComingSoon = $poll->isComingSoon();
        $poll->isLocked = $poll->isLocked();
        $poll->isRunning = $poll->isRunning();
        $poll->edit_link = route('admin.poll.edit', $poll->id);
        $poll->delete_link = route('admin.poll.remove', $poll->id);

        return response()->json([
            'poll' => $poll
        ], 200);
    }
}
