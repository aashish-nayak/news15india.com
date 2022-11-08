<?php

namespace App\Http\Controllers;

use App\DataTables\ComplaintDataTable;
use App\Models\Complaint;
use App\Models\ComplaintReply;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class ComplaintController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ComplaintDataTable $datatable)
    {
        return $datatable->render('backpanel.complaint.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'subject' => 'required|string',
            'link' => 'url',
            'complaint_message' => 'required|string',
        ]);
        try {
            $data = $request->except('_token');
            $data['user_id'] = auth('web')->id();
            $data['complaint_id'] = Str::random(16);
            Complaint::create($data);
            $request->session()->flash('success','Complaint Submitted');
        } catch (\Exception $e) {
            $request->session()->flash('error',$e->getMessage());
        }
        return redirect()->back();
    }

    public function store_reply(Request $request)
    {
        try {
            $data = $request->except('_token');
            $data['reference_id'] = auth('web')->id();
            $data['reference_type'] = get_class(auth('web')->user());
            ComplaintReply::create($data);
            $request->session()->flash('success','Reply Sent!!!');
        } catch (Exception $e) {
            $request->session()->flash('error',$e->getMessage());
        }
        return redirect()->back();
    }

    public function send_reply(Request $request)
    {
        try {
            $data = $request->except('_token');
            $data['reference_id'] = auth('admin')->id();
            $data['reference_type'] = get_class(auth('admin')->user());
            ComplaintReply::create($data);
            request()->session()->flash('success','Reply Sent!!!');
        } catch (Exception $e) {
            request()->session()->flash('error',$e->getMessage());
        }
        return redirect()->route('admin.complaint.view',$request->complaint_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Complaint  $complaint
     * @return \Illuminate\Http\Response
     */
    public function show(Complaint $complaint)
    {
        return view('backpanel.complaint.detail',compact('complaint'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Complaint  $complaint
     * @return \Illuminate\Http\Response
     */
    public function edit(Complaint $complaint)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Complaint  $complaint
     * @return \Illuminate\Http\Response
     */
    public function status(Request $request)
    {
        $status = Complaint::find($request->id);
        $status->status = $request->status;
        $status->save();
        return response()->json(['success' => 'Status Changed Successfully!','status'=>$status->status]);
    }

    public function update(Request $request, Complaint $complaint)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Complaint  $complaint
     * @return \Illuminate\Http\Response
     */
    public function destroy(Complaint $complaint)
    {
        //
    }
}
