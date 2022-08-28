<?php

namespace App\Http\Controllers;

use App\Classes\CommentControllerInterface;
use App\Models\Comment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;
use Spatie\Honeypot\ProtectAgainstSpam;

class CommentController extends Controller implements CommentControllerInterface
{
    public function __construct()
    {
        // $this->middleware('web');

        // if (config('comments.guest_commenting') == true) {
        //     $this->middleware('auth')->except('store');
        //     $this->middleware(ProtectAgainstSpam::class)->only('store');
        // } else {
        //     $this->middleware('auth');
        // }
    }

    /**
     * Creates a new comment for given model.
     */
    public function store(Request $request)
    {
        // If guest commenting is turned off, authorize this action.
        if (config('comments.guest_commenting') == false) {
            Gate::authorize('create-comment', Comment::class);
        }

        // Define guest rules if user is not logged in.
        if (!Auth::guard(config('comments.guard'))->check()) {
            $guest_rules = [
                'guest_name' => 'required|string|max:255',
                'guest_email' => 'required|string|email|max:255',
            ];
        }

        // Merge guest rules, if any, with normal validation rules.
        Validator::make($request->all(), array_merge($guest_rules ?? [], [
            'commentable_type' => 'required|string',
            'commentable_id' => 'required|string|min:1',
            'message' => 'required|string'
        ]))->validate();

        $model = $request->commentable_type::findOrFail($request->commentable_id);

        $commentClass = config('comments.model');
        $comment = new $commentClass;

        if (!Auth::guard(config('comments.guard'))->check()) {
            $comment->guest_name = $request->guest_name;
            $comment->guest_email = $request->guest_email;
        } else {
            $comment->commenter()->associate(Auth::guard(config('comments.guard'))->user());
        }

        $comment->commentable()->associate($model);
        $comment->comment = $request->message;
        $comment->approved = !config('comments.approval_required');
        $comment->save();

        return Redirect::to(URL::previous() . '#comment-' . $comment->getKey());
    }

    /**
     * Updates the message of the comment.
     */
    public function update(Request $request, Comment $comment)
    {
        Gate::authorize('edit-comment', $comment);

        Validator::make($request->all(), [
            'message' => 'required|string'
        ])->validate();

        $comment->update([
            'comment' => $request->message
        ]);

        return Redirect::to(URL::previous() . '#comment-' . $comment->getKey());
    }

    /**
     * Deletes a comment.
     */
    public function destroy(Comment $comment)
    {
        Gate::authorize('delete-comment', $comment);

        if (config('comments.soft_deletes') == true) {
			$comment->delete();
		}
		else {
			$comment->forceDelete();
		}

        return Redirect::back();
    }

    /**
     * Creates a reply "comment" to a comment.
     */
    public function reply(Request $request, Comment $comment)
    {
        Gate::authorize('reply-to-comment', $comment);

        Validator::make($request->all(), [
            'message' => 'required|string'
        ])->validate();

        $commentClass = config('comments.model');
        $reply = new $commentClass;
        $reply->commenter()->associate(Auth::guard(config('comments.guard'))->user());
        $reply->commentable()->associate($comment->commentable);
        $reply->parent()->associate($comment);
        $reply->comment = $request->message;
        $reply->approved = !config('comments.approval_required');
        $reply->save();

        return Redirect::to(URL::previous() . '#comment-' . $reply->getKey());
    }

    // ============== Admin Panel functions =================

    public function show()
    {
        return view('backpanel.comment.index');
    }
    public function unapproved()
    {
        return view('backpanel.comment.unapproved');
    }

    public function trashview()
    {
        return view('backpanel.comment.trash');
    }

    public function index($approved = 1,Request $request)
    {
        $draw = $request->get('draw');
        $start = $request->get("start");
        $rowperpage = $request->get("length"); // Rows display per page

        $columnIndex_arr = $request->get('order');
        $columnName_arr = $request->get('columns');
        $order_arr = $request->get('order');
        $search_arr = $request->get('search');

        $columnIndex = $columnIndex_arr[0]['column']; // Column index
        $columnName = $columnName_arr[$columnIndex]['data']; // Column name
        $columnSortOrder = $order_arr[0]['dir']; // asc or desc
        $searchValue = $search_arr['value']; // Search value

        // Total records
        $totalRecords = Comment::select('count(*) as allcount')->where('approved',$approved)->count();
        $totalRecordswithFilter = Comment::select('count(*) as allcount')->where('approved',$approved)->where('comment', 'like', '%' . $searchValue . '%')->count();

        // Fetch records
        $records = Comment::orderBy($columnName, $columnSortOrder)
            ->where('comments.comment', 'like', '%' . $searchValue . '%')->where('approved',$approved)
            ->select('comments.*')
            ->skip($start)
            ->take($rowperpage)
            ->get();

        $data_arr = array();

        foreach ($records as $record) {
            $id = $record->id;
            $comment = $record->comment;
            $news = $record->commentable->title;
            $user = $record->commenter->name;
            $approved = $record->approved;
            $created = Carbon::parse($record->created_at)->diffForHumans();

            $data_arr[] = array(
                "id" => $id,
                "comment" => $comment,
                "news" => $news,
                "user" => $user,
                "approved" => $approved,
                "created" => $created,
            );
        }

        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordswithFilter,
            "aaData" => $data_arr
        );

        return response()->json($response);
    }

    public function ajaxtrash(Request $request)
    {
        $draw = $request->get('draw');
        $start = $request->get("start");
        $rowperpage = $request->get("length"); // Rows display per page

        $columnIndex_arr = $request->get('order');
        $columnName_arr = $request->get('columns');
        $order_arr = $request->get('order');
        $search_arr = $request->get('search');

        $columnIndex = $columnIndex_arr[0]['column']; // Column index
        $columnName = $columnName_arr[$columnIndex]['data']; // Column name
        $columnSortOrder = $order_arr[0]['dir']; // asc or desc
        $searchValue = $search_arr['value']; // Search value

        // Total records
        $totalRecords = Comment::onlyTrashed()->select('count(*) as allcount')->count();
        $totalRecordswithFilter = Comment::onlyTrashed()->select('count(*) as allcount')->where('comment', 'like', '%' . $searchValue . '%')->count();

        // Fetch records
        $records = Comment::onlyTrashed()->orderBy($columnName, $columnSortOrder)
            ->where('comments.comment', 'like', '%' . $searchValue . '%')
            ->select('comments.*')
            ->skip($start)
            ->take($rowperpage)
            ->get();

        $data_arr = array();

        foreach ($records as $record) {
            $id = $record->id;
            $comment = $record->comment;
            $news = $record->commentable->title;
            $user = $record->commenter->name;
            $approved = $record->approved;
            $created = Carbon::parse($record->created_at)->diffForHumans();

            $data_arr[] = array(
                "id" => $id,
                "comment" => $comment,
                "news" => $news,
                "user" => $user,
                "approved" => $approved,
                "created" => $created,
            );
        }

        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordswithFilter,
            "aaData" => $data_arr
        );

        return response()->json($response);
    }

    public function status($id,$approved_type = 1)
    {
        $status = Comment::find($id);
        $status->approved = $approved_type;
        $status->save();
        session()->flash('success', 'Comment Approval Changed!');
        return redirect()->back();
    }

    public function restore($id)
    {
        $comment = Comment::withTrashed()->find($id);
        $comment->restore();
        session()->flash('success', 'Comment Restored!');
        return Redirect::back();
    }

    public function trash(Comment $comment){
        session()->flash('success', 'Comment Trashed!');
        $comment->delete();
        return Redirect::back();
    }

    public function admin_destroy($id){
        $comment = Comment::withTrashed()->find($id);
        $comment->forceDelete();
        session()->flash('success', 'Comment Deleted Permanently!');
        return Redirect::back();
    }

}
