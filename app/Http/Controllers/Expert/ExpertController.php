<?php

namespace App\Http\Controllers\Expert;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExpertController extends Controller
{
    public function loginForm()
    {
        return view('expert.auth.login');
    }

    public function login(Request $request)
    {
        $check = $request->all();

        if (Auth::guard('expert')->attempt(['email' => $check['email'], 'password' => $check['password']])) {
            $notification = array(
                'message' => 'Successfully Logged In!',
                'alert-type' => 'success'
            );
            return redirect()->route('expert.dashboard')->with($notification);
        } else {
            $notification = array(
                'message' => 'Invalid Email or Password!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function dashboard()
    {
        return view('expert.home.index');
    }

    public function logout()
    {
        Auth::guard('expert')->logout();
        $notification = array(
            'message' => 'Successfully Logged Out!',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }
}
