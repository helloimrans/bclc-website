<?php

namespace App\Http\Controllers\Learner;

use App\Http\Controllers\Controller;
use App\Models\Learner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LearnerController extends Controller
{
    public function registrationForm()
    {
        $data['userType'] = "Learner";
        return view('frontend.auth.registration', $data);
    }

    public function registration(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'mobile' => 'required|max:11|min:11',
            'email' => 'required|email|unique:learners,email',
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

        $learner = new Learner();
        $learner->name = $request->name;
        $learner->email = $request->email;
        $learner->mobile = $request->mobile;
        $learner->password = bcrypt($request->password);
        $learner->save();

        Auth::guard('learner')->login($learner);

        $notification = array(
            'message' => 'Registration Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('learner.dashboard')->with($notification);
    }

    public function loginForm()
    {
        $data['userType'] = "Learner";
        return view('frontend.auth.login', $data);
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

    public function profile()
    {
        $data['learner'] = Learner::find(Auth::guard('learner')->user()->id);
        return view('learner.profile.profile', $data);
    }

    public function edit_profile()
    {
        $data['learner'] = Learner::find(Auth::guard('learner')->user()->id);
        return view('learner.profile.edit_profile', $data);
    }
    public function update_profile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            $notification = array(
                'message' => 'Something went wront!, Please try again.',
                'alert-type' => 'error'
            );
            return redirect()->back()->withErrors($validator)->withInput()->with($notification);
        }

        $input = $request->all();
        $data = Learner::find(Auth::guard('learner')->user()->id);

        // $image = $request->file('image');
        // if ($image) {
        //     $image_path = public_path($data->image);
        //     @unlink($image_path);
        //     $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
        //     $image->move(public_path('uploaded/learner'), $imageName);
        //     $input['image'] = '/uploaded/learner/' . $imageName;
        // }
        $data->update($input);
        $notification = array(
            'message' => 'Successfully profile updated!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function security()
    {
        return view('learner.profile.security');
    }
    public function update_password(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'current_password' => 'required',
            'new_password' => 'min:8|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:8'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error','Something went wront!, Please try again.');
        }

        if (Auth::guard('learner')->attempt(['id' => Auth::guard('learner')->user()->id, 'password' => $request->current_password])) {
            $user = Learner::find(Auth::guard('learner')->user()->id);
            $user->password = bcrypt($request->new_password);
            $user->save();
            return redirect()->back()->with('success','Successfully password changed.');
        } else {
            $notification = array(
                'message' => 'Sorry! Your current password dost not match.',
                'alert-type' => 'error'
            );
            return redirect()->back()->with('error','Sorry! Your current password dost not match.');
        }
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
