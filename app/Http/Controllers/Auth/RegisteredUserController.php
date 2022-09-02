<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserDetail;
use App\Models\Visitor;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{

    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', Rules\Password::defaults()],
            'mobile_no' => ['required','integer'],
            'wa_number' => ['integer'],
            'pincode' => ['integer'],
            'country' => ['required'],
            'state' => ['required'],
            'city' => ['required'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        UserDetail::create([
            'user_id' => $user->id,
            'whatsapp_number' => $request->wa_number,
            'phone_number' => $request->mobile_no,
            'country_id' => $request->country,
            'state_id' => $request->state,
            'city_id' => $request->city,
            'zip' => $request->pincode
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
        Auth::login($user);
        if(Session::get('redirect_to')){
            return redirect(Session::get('redirect_to'));
        }
        return redirect(RouteServiceProvider::HOME);
    }
}
