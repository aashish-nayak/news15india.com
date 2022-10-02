<?php

namespace App\Http\Controllers;

use App\DataTables\ReporterDataTable;
use App\Http\Requests\ApplicationRequest;
use App\Models\Payment;
use App\Models\Reporter;
use App\Models\User;
use App\Models\UserDetail;
use App\Models\Visitor;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
class ReporterController extends Controller
{
    public function application_form()
    {

        if((auth('web')->check() && Reporter::where('user_id',auth('web')->id())->count() > 0) || Reporter::where('user_ip',request()->ip())->count() > 0){
            return redirect()->route('thank-you');
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
            Payment::create([
                'order_id' => Str::random(20),
                'user_id' => $reporter->user_id,
                'reference_id' => $reporter->id,
                'reference_type' => get_class($reporter),
                'payment_method' => 'manual',
                'amount' => 10000,
            ]);
            return redirect()->route('thank-you');
        } catch (\Exception $e) {
            $request->session()->flash('error', 'Unable to process request.Error:'.json_encode($e->getMessage(), true));
            return redirect()->back();
        }
    }
    
    public function uploader($request,$uploadfile,$edit = null)
    {
        $email = (auth('web')->check()) ? auth('web')->user()->email : $request->email;
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
    
    public function show(ReporterDataTable $datatable)
    {
        return $datatable->render('backpanel.reporter.index');
    }

    public function view($id)
    {
        $reporter = Reporter::find($id);
        return view('backpanel.reporter.view-form',compact('reporter'));
    }
}
