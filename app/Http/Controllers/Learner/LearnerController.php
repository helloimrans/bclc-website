<?php

namespace App\Http\Controllers\Learner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LearnerController extends Controller
{
    public function loginForm()
    {
        return view('learner.auth.login');
    }

    public function login(Request $request)
    {
        $check = $request->all();

        if (Auth::guard('learner')->attempt(['email' => $check['email'], 'password' => $check['password']])) {
            $notification = array(
                'message' => 'Successfully Logged In!',
                'alert-type' => 'success'
            );
            return redirect()->route('learner.dashboard')->with($notification);
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
        return view('learner.home.index');
    }

    public function logout()
    {
        Auth::guard('learner')->logout();
        $notification = array(
            'message' => 'Successfully Logged Out!',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }
}
