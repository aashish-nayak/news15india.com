<?php

namespace App\Http\Controllers;

use App\Models\Reporter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ReporterController extends Controller
{
    public function application_form()
    {
        return view('application-form');
    }

    public function storeApplication(Request $request)
    {
        $uploadData = $request->except('_token');
        $uploadData['avatar'] = $this->uploader($request,'avatar');
        $uploadData['10th_image'] = $this->uploader($request,'10th_image');
        $uploadData['12th_image'] = $this->uploader($request,'12th_image');
        $uploadData['graduation_image'] = $this->uploader($request,'graduation_image');
        $uploadData['diploma_image'] = $this->uploader($request,'diploma_image');
        $uploadData['other_certificate'] = $this->uploader($request,'other_certificate');
        $uploadData['aadhar_image'] = $this->uploader($request,'aadhar_image');
        $uploadData['pan_image'] = $this->uploader($request,'pan_image');
        $uploadData['voter_driving_image'] = $this->uploader($request,'voter_driving_image');
        $uploadData['police_verification'] = $this->uploader($request,'police_verification');
        $uploadData['other_document'] = $this->uploader($request,'other_document');
        if(auth('web')->check()){
            $uploadData['user_id'] = auth('web')->user()->id;
            $uploadData['email'] = auth('web')->user()->email;
        }
        $query = Reporter::create($uploadData);
        return redirect()->route('thank-you');
    }
    
    public function uploader($request,$uploadfile,$edit = null)
    {
        if($request->hasFile($uploadfile)){
            if($edit != null && Storage::exists('public/reporter-application/'.$edit->email."/".$edit[$uploadfile])){
                Storage::delete('public/reporter-application/'.$edit->email."/".$edit[$uploadfile]);
            }
            $file = $request->file($uploadfile);
            $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $file->getClientOriginalExtension();
            $filename =  $uploadfile . '__' . $request->email . '_' .  time() . '.' . $extension;
            $file->storeAs('public/reporter-application/'.$request->email, $filename);
            return $filename;
        }
        return null;
    }
}
