<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function loginForm()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $check = $request->all();

        if (Auth::guard('admin')->attempt(['email' => $check['email'], 'password' => $check['password']])) {
            $notification = array(
                'message' => 'Successfully Loged In!',
                'alert-type' => 'success'
            );
            return redirect()->route('admin.dashboard')->with($notification);
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
        return view('admin.home.index');
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        $notification = array(
            'message' => 'Successfully Loged Out!',
            'alert-type' => 'info'
        );

        return redirect()->route('admin.login')->with($notification);
    }
}
