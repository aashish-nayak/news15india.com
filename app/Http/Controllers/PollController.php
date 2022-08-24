<?php

namespace App\Http\Controllers;

use App\Exceptions\DuplicatedOptionsException;
use App\Helpers\PollHandler;
use App\Http\Requests\PollCreationRequest;
use App\Models\Admin;
use App\Models\Poll;
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
            $poll->edit_link = route('admin.poll.edit', $poll->id);
            $poll->delete_link = route('admin.poll.remove', $poll->id);
            $poll->lock_link = route('admin.poll.lock', $poll->id);
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

    public function edit(Poll $poll)
    {
        $canChangeOptions = $poll->votes()->count() === 0;
        $edit = $poll;
        $polls = Poll::withCount('options', 'votes')->get()->map(function ($poll){
            $poll->isComingSoon = $poll->isComingSoon();
            $poll->isLocked = $poll->isLocked();
            $poll->isRunning = $poll->isRunning();
            $poll->hasEnded = $poll->hasEnded();
            $poll->edit_link = route('admin.poll.edit', $poll->id);
            $poll->delete_link = route('admin.poll.remove', $poll->id);
            $poll->lock_link = route('admin.poll.lock', $poll->id);
            $poll->unlock_link = route('admin.poll.unlock', $poll->id);
            return $poll;
        });
        $creators = Admin::get();
        return view('backpanel.poll.index', compact('polls','creators','edit','canChangeOptions'));
    }


    public function update(Poll $poll, PollCreationRequest $request)
    {
        PollHandler::modify($poll, $request->all());
        return redirect()->route('admin.poll.index')->with('success', 'Poll Updated Successfully!');
    }

    public function remove(Poll $poll)
    {
        $poll->remove();
        return redirect()->back()->with('success','Poll Deleted Successfully!');
    }

    public function lock(Poll $poll)
    {
        $poll->lock();

        $poll->isComingSoon = $poll->isComingSoon();
        $poll->isLocked = $poll->isLocked();
        $poll->isRunning = $poll->isRunning();
        $poll->hasEnded = $poll->hasEnded();
        $poll->edit_link = route('poll.edit', $poll->id);
        $poll->delete_link = route('poll.remove', $poll->id);

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
        $poll->edit_link = route('poll.edit', $poll->id);
        $poll->delete_link = route('poll.remove', $poll->id);

        return response()->json([
            'poll' => $poll
        ], 200);
    }
}
