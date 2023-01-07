<?php

namespace App\Http\Controllers;

use App\Events\SendMessage;
use App\Models\Admin;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        return view('backpanel.chat.chat');
    }

    public function users()
    {
        //    return Admin::has('messages')->where('id','!=',auth('admin')->id())->get();
        return Admin::withCount('messages','unread_messages')->orderBy('unread_messages_count','DESC')->where('id', '!=', auth('admin')->id())->get();
    }

    public function messages()
    {
        return Message::with('user')->get();
    }

    public function contactMessages($receiver)
    {
        return Message::with('receiver', 'sender')->where('sender_id', auth('admin')->id())->where('receiver_id', $receiver)->orWhere('sender_id', $receiver)->where('receiver_id', auth('admin')->id())->get();
    }

    public function messageStore(Request $request)
    {
        $user = Admin::find(Auth::guard('admin')->id());
        $messages = Message::create([
            'receiver_id' => $request->receiver,
            'sender_id' => $request->user,
            'message' => $request->message,
        ]);
        $messages = Message::with('receiver', 'sender')->find($messages->id);
        broadcast(new SendMessage($messages))->toOthers();

        return response()->json($messages);
    }

    public function read($sender)
    {
        $messages = Message::where('sender_id', $sender);
        $messages->where('read',0)->update(['read'=>1]);
    }

    public function fetchUnread($sender_id)
    {
        $user = Admin::withCount('messages','unread_messages')->find($sender_id);
        return response()->json($user);
    }
}
