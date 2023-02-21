<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\SocialLogin;
use App\Models\User;
use App\Models\UserDetail;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;

class AuthenticatedSessionController extends Controller
{
    public function create()
    {
        if(request('redirect_to')){
            Session::put('redirect_to', request('redirect_to'));
        }
        return view('auth.login');
    }

    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();
        if(Session::get('redirect_to')){
            return redirect(Session::get('redirect_to'));
        }
        return redirect()->intended(RouteServiceProvider::HOME);
    }

    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function redirectToProvider($provider)
    {
        return Socialite::driver(($provider))->redirect();
    }

    public function handleProviderCallback($provider)
    {
        $response = Socialite::driver($provider)->user();
        $user = User::where('email',$response->email)->first();
        if($user == null){
            $user = new User();
            $user->name = $response->name;
            $user->email = $response->email;
            $user->password = bcrypt($response->email);
            $user->save();
            $detail = new UserDetail();
            $detail->user_id = $user->id;
            $detail->avatar = $response->avatar;
            $detail->save();
            $socialuser = new SocialLogin();
            $socialuser->user_id = $user->id;
            $socialuser->provider_name = $provider;
            $socialuser->provider_id = $response->id;
            $socialuser->save();
        }
        Auth::login($user);
		return redirect()->intended(RouteServiceProvider::HOME);
	}
}
