<?php

namespace App\Http\Controllers;

use App\DataTables\AdvertDataTable;
use App\Models\Advert;
use App\Models\AdvertCategory;
use App\Models\AdvertPlacement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
class AdvertController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(AdvertDataTable $datatable)
    {
        return $datatable->render('backpanel.advert.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = Advert::latest()->select('id')->first()->id ?? 0;
        $booking_id = rand(1000000, 9999999).str_pad($id+1, 3, STR_PAD_LEFT);
        $categories = AdvertCategory::where('status',1)->select('id','category')->get();
        $placements = AdvertPlacement::where('status',1)->select('id','slug')->get();
        return view('backpanel.advert.create',compact('categories','placements','booking_id'));
    }

    public function status(Advert $advert)
    {
        $advert->status = ($advert->status == 1) ? 0 : 1;
        $advert->save();
        return response()->json(['success' => 'Status Changed Successfully!','status'=>$advert->status]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = Advert::latest()->select('id')->first()->id ?? 0;
        if($request->has('id')){
            $ad = Advert::find($request->id);
            $message = 'Advertisement Updated Successfully !';
        }else{
            $ad = new Advert();
            $ad->booking_id = rand(1000000, 9999999).str_pad($id+1, 3, STR_PAD_LEFT);
            $ad->slug = Str::random().rand(10000, 99999).str_pad($id+1, 3, STR_PAD_LEFT);
            $message = 'Advertisement added Successfully !';
        }
        $ad->admin_id = auth('admin')->id();
        $ad->advertiser_name = $request->advertiser_name;
        $ad->advertiser_number = $request->advertiser_number;
        $ad->advertiser_email = $request->advertiser_email;
        $ad->billing_name = $request->billing_name;
        $ad->billing_address = $request->billing_address;
        $ad->block = $request->block;
        $ad->country_id = $request->country;
        $ad->state_id = $request->state;
        $ad->city_id = $request->city;
        $ad->pincode = $request->pincode;
        $ad->package = $request->package;
        $ad->ad_type = $request->ad_type;
        $ad->ad_category = $request->ad_category;
        $ad->ad_width = $request->ad_width;
        $ad->ad_height = $request->ad_height;
        $ad->ad_duration = $request->ad_duration;
        $ad->publish_date = $request->publish_date;
        $ad->expire_date = $request->expire_date;
        $ad->discount = $request->discount;
        $ad->ad_title = $request->ad_title;
        $ad->ad_description = $request->ad_description;
        $ad->ad_redirect = (isset($request->ad_redirect)) ? $request->ad_redirect : null;
        if($request->hasFile('ad_image')){
            $ad->ad_image = (!$request->has('id')) ? $this->uploader($request,'ad_image') : $this->uploader($request,'ad_image',$ad);
        }
        $ad->is_approved = 'approved';
        $ad->status =  1;
        $ad->save();
        $ad->ad_locations()->sync($request->ad_location);
        request()->session()->flash('success',$message);
        return redirect()->route('admin.advert.index');
    }

    public function uploader($request,$uploadfile,$edit = null)
    {
        if($request->hasFile($uploadfile)){
            if($edit != null){
                $edit->deleteImage();
            }
            $file = $request->file($uploadfile);
            $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $file->getClientOriginalExtension();
            $filename =  $uploadfile .'___' . Str::slug($request->ad_width) .'x'. Str::slug($request->ad_height) . '__' . $request->email . '__' .  time() . '.' . $extension;
            $file->storeAs('public/advertisements', $filename);
            return $filename;
        }
        return null;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Advert  $advert
     * @return \Illuminate\Http\Response
     */
    public function show(Advert $advert)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Advert  $advert
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = Advert::where('booking_id',$id)->first();
        $categories = AdvertCategory::where('status',1)->select('id','category')->get();
        $placements = AdvertPlacement::where('status',1)->select('id','slug')->get();
        return view('backpanel.advert.create',compact('categories','placements','edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Advert  $advert
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Advert $advert)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Advert  $advert
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ad = Advert::where('booking_id',$id)->first();
        $ad->deleteImage();
        $ad->delete();
        request()->session()->flash('success','Ad Deleted Successfully !');
        return back();
    }
}
