<?php

namespace App\Http\Controllers\Expert;

use App\Http\Controllers\Controller;
use App\Models\Expert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ExpertController extends Controller
{

    public function registrationForm()
    {
        $data['userType'] = "Expert";
        return view('frontend.pages.auth.registration', $data);
    }

    public function registration(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'mobile' => 'required|max:11|min:11',
            'email' => 'required|email|unique:experts,email',
            'password' => 'min:8|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:8',
        ]);

        if ($validator->fails()) {
            $notification = array(
                'message' => 'Something went wront!, Please try again.',
                'alert-type' => 'error'
            );
            return redirect()->back()->withErrors($validator)->withInput()->with($notification);
        }

        $learner = new Expert();
        $learner->name = $request->name;
        $learner->email = $request->email;
        $learner->mobile = $request->mobile;
        $learner->is_lawyer = $request->is_lawyer;
        $learner->is_consultant = $request->is_consultant;
        $learner->is_trainer = $request->is_trainer;
        $learner->is_writer = $request->is_writer;
        $learner->password = bcrypt($request->password);
        $learner->save();

        Auth::guard('expert')->login($learner);

        $notification = array(
            'message' => 'Registration Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('expert.dashboard')->with($notification);
    }
    public function loginForm()
    {
        $data['userType'] = "Expert";
        return view('frontend.pages.auth.login', $data);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required|min:8',
        ]);

        if ($validator->fails()) {
            $notification = array(
                'message' => 'Something went wront!, Please try again.',
                'alert-type' => 'error'
            );
            return redirect()->back()->withErrors($validator)->withInput()->with($notification);
        }
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
