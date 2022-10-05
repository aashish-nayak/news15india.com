<?php

namespace App\Http\Controllers;

use App\DataTables\ReporterDataTable;
use App\Http\Requests\ApplicationRequest;
use App\Models\Admin;
use App\Models\Payment;
use App\Models\Reporter;
use App\Models\User;
use App\Models\UserDetail;
use App\Models\Visitor;
use Exception;
use Illuminate\Auth\Events\Registered;
use Illuminate\Console\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
class ReporterController extends Controller
{
    public function application_form()
    {

        $reporter = Reporter::where('user_id',auth('web')->id());
        $reporter2 = Reporter::where('user_ip',request()->ip());
        if((auth('web')->check() && $reporter->count() > 0)){
            $order = $reporter->first()->payment;
            return redirect()->route('thank-you',$order->order_id);
        }else if($reporter2->count() > 0){
            $order = $reporter2->first()->payment;
            return redirect()->route('thank-you',$order->order_id);
        }
        return view('application-form');
    }

    public function storeApplication(ApplicationRequest $request)
    {
        try {
            if(!auth('web')->check() && User::where('email',$request->email)->count() == 0){
                $user = User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->email),
                ]);
                UserDetail::create([
                    'user_id' => $user->id,
                    'whatsapp_number' => $request->whatsapp_number,
                    'phone_number' => $request->phone_number,
                    'country_id' => $request->country_id,
                    'state_id' => $request->state_id,
                    'city_id' => $request->city_id,
                    'zip' => $request->zip
                ]);
                event(new Registered($user));
                if(Visitor::where('user_id',$user->id)->count() == 0){
                    $data = [
                        'user_id' => $user->id,
                        'ip' => request()->getClientIp(),
                        'clicks' => 0,
                    ];
                    Visitor::create($data);
                }
            }else if(!auth('web')->check() && User::where('email',$request->email)->count() > 0){
                $user = User::where('email',$request->email)->first();
            }else{
                $user = auth('web')->user();
            }
            if(!auth('web')->check()){
                Auth::login($user);
            }
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
            $uploadData['user_ip'] = request()->ip();
            $uploadData['user_id'] = auth('web')->user()->id;
            $uploadData['email'] = auth('web')->user()->email;
            $reporter = Reporter::create($uploadData);
            $order = Payment::create([
                'order_id' => Str::random(20),
                'user_id' => $reporter->user_id,
                'reference_id' => $reporter->id,
                'reference_type' => get_class($reporter),
                'payment_method' => 'manual',
                'amount' => 10000,
            ]);
            return redirect()->route('thank-you',$order->order_id);
        } catch (\Exception $e) {
            $request->session()->flash('error', 'Unable to process request.Error:'.json_encode($e->getMessage(), true));
            return redirect()->back();
        }
    }
    
    public function uploader($request,$uploadfile,$edit = null)
    {
        $email = (auth('web')->check() && $edit == null) ? auth('web')->user()->email : $request->email;
        if($request->hasFile($uploadfile)){
            if($edit != null && Storage::exists('public/reporter-application/'.$edit->email."/".$edit[$uploadfile])){
                Storage::delete('public/reporter-application/'.$edit->email."/".$edit[$uploadfile]);
            }
            $file = $request->file($uploadfile);
            $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $file->getClientOriginalExtension();
            $filename =  $uploadfile . '__' . $email . '__' .  time() . '.' . $extension;
            $file->storeAs('public/reporter-application/'.$email, $filename);
            return $filename;
        }
        return null;
    }
    
    public function update(Request $request)
    {
        $data = [
            'name' => 'required',
            'father_name' => 'required',
            'mother_name' => 'required',
            'dob' => 'required|date',
            'gender' => 'required',
            'marital_status' => 'required',
            'blood_group' => 'required',
            'aadhar_number' => 'required',
            'pan_number' => 'required',
            'home_address' => 'required',
            'tehsil_block' => 'required',
            'country_id' => 'required',
            'state_id' => 'required',
            'city_id' => 'required',
            'zip' => 'required',
            'police_station' => 'required',
            'phone_number' => 'required',
            'whatsapp_number' => 'required',
            'emergency_number' => 'required',
        ];
        $reporter = Reporter::find($request->id);
        $uploadData = $request->except('_token','id');
        $uploadData['avatar'] = $this->uploader($request,'avatar',$reporter);
        $uploadData['10th_image'] = $this->uploader($request,'10th_image',$reporter);
        $uploadData['12th_image'] = $this->uploader($request,'12th_image',$reporter);
        $uploadData['graduation_image'] = $this->uploader($request,'graduation_image',$reporter);
        $uploadData['diploma_image'] = $this->uploader($request,'diploma_image',$reporter);
        $uploadData['other_certificate'] = $this->uploader($request,'other_certificate',$reporter);
        $uploadData['aadhar_image'] = $this->uploader($request,'aadhar_image',$reporter);
        $uploadData['pan_image'] = $this->uploader($request,'pan_image',$reporter);
        $uploadData['voter_driving_image'] = $this->uploader($request,'voter_driving_image',$reporter);
        $uploadData['police_verification'] = $this->uploader($request,'police_verification',$reporter);
        $uploadData['other_document'] = $this->uploader($request,'other_document',$reporter);
        $uploadData = $this->filterData($uploadData);
        $request->validate($data);
        try {
            $email = $reporter->email;
            $reporter->update($uploadData);
            if($email != $request->email){
                Storage::move('public/reporter-application/'.$email,'public/reporter-application/'.$request->email);
            }
            $request->session()->flash('success',"Reporter Data Updated Sucessfully !!!");
        } catch (Exception $e) {
            $request->session()->flash('error',$e->getMessage());
        }
        return redirect()->back();
    }

    public function filterData($array)
    {
        $filtered = [];
        foreach ($array as $key => $value) {
            if($value != null || is_array($value) || $value != ''){
                $filtered[$key] = $value;
            }
        }
        return $filtered;
    }

    public function show(ReporterDataTable $datatable)
    {
        return $datatable->render('backpanel.reporter.index');
    }

    public function view($id)
    {
        $reporter = Reporter::find($id);
        return view('backpanel.reporter.view-form',compact('reporter'));
    }

    public function approved(Reporter $reporter)
    {
        $reporter->app_status = 'approved';
        $reporter->status = 1;
        $reporter->payment()->update([
            'payment_status' => 1,
        ]);
        $admin = Admin::withTrashed()->where('email',$reporter->email);
        if($admin->count() == 0){
            $admin = Admin::create([
                'name'=> $reporter->name,
                'email'=> $reporter->email,
                'password'=> Hash::make($reporter->email),
            ]);
            $admin->details()->create([
                'url' => strtolower(Str::random(16))."/".Str::slug($reporter->name),
                'avatar' => $reporter->avatar,
                'phone' => $reporter->phone_number,
                'address' => $reporter->home_address,
                'country_id' => $reporter->country_id,
                'state_id' => $reporter->state_id,
                'city_id' => $reporter->city_id,
                'zip' => $reporter->zip,
            ]);
        }else{
            $admin = $admin->first();
        }
        $reporter->admin_id = $admin->id;
        $reporter->save();
        return redirect()->route('admin.user.edit',$admin->id);
    }
}
