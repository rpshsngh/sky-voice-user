<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserClient;
use Carbon\Carbon;

class LoginController extends Controller
{
    public function getLogin()
    {
        return view('login.index');
    }

    public function submitLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('client')->attempt($credentials)) {

            $profile_pic = Auth::guard('client')->user()->profile_pic;
            $last_login_ip_address = Auth::guard('client')->user()->last_login_ip_address;
            $last_login_time = Auth::guard('client')->user()->last_login_time;

            // Store in the session
            session([
                'last_login_ip_address' => $last_login_ip_address ? $last_login_ip_address : "Last Login IP Address",
                'last_login_time' => $last_login_time ? $last_login_time : "Last Login Time",
                'profile_pic' => $profile_pic ? $profile_pic : asset("assets/images/profile-pic.png"),
            ]);

            return redirect()->intended('user-management');
        }

        return redirect()->back()->withErrors(['email' => 'Invalid credentials.']);
    }

    public function submitLogout(Request $request)
    {
        $client = UserClient::find(Auth::guard('client')->id());

        if ($client) {
            $client->last_login_ip_address = $request->ip();
            $client->last_login_time = Carbon::now();
            $client->save();
        }

        Auth::guard('client')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
