<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function userRegistrationForm()
    {
        $data['userType'] = User::NORMAL_USER;
        return view('frontend.auth.registration', $data);
    }
    public function expertRegistrationForm()
    {
        $data['userType'] = User::EXPERT;
        return view('frontend.auth.registration', $data);
    }

    public function registration(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'mobile' => 'required|max:11|min:11',
            'email' => 'required|email|unique:users,email',
            'is_lawyer' => 'nullable|boolean',
            'is_consultant' => 'nullable|boolean',
            'is_trainer' => 'nullable|boolean',
            'is_writer' => 'nullable|boolean',
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

        if($request->input('user_type') == User::EXPERT){
            $userType = User::EXPERT;
        }else{
            $userType = User::NORMAL_USER;
        }

        $user = new User();
        $user->user_type = $userType;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->mobile = $request->input('mobile');
        $user->password = bcrypt($request->input('password'));
        $user->is_lawyer = $request->input('is_lawyer') ?? 0;
        $user->is_consultant = $request->input('is_consultant') ?? 0;
        $user->is_trainer = $request->input('is_trainer') ?? 0;
        $user->is_writer = $request->input('is_writer') ?? 0;
        $user->save();

        Auth::login($user);

        $notification = array(
            'message' => 'Registration Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->intended(route('user.dashboard'))->with($notification);
    }

    public function userLoginForm()
    {
        Redirect::setIntendedUrl(url()->previous());
        $data['userType'] = User::NORMAL_USER;
        return view('frontend.auth.login', $data);
    }

    public function expertLoginForm()
    {
        Redirect::setIntendedUrl(url()->previous());
        $data['userType'] = User::EXPERT;
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

        if (Auth::attempt(['email' => $check['email'], 'password' => $check['password']])) {
            $notification = array(
                'message' => 'Successfully Logged In!',
                'alert-type' => 'success'
            );
            return redirect()->intended(route('user.dashboard'))->with($notification);
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

    public function profile()
    {
        $data['user'] = User::find(Auth::user()->id);
        return view('admin.profile.profile', $data);
    }

    public function update_profile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'mobile' => 'required',
            'dob' => 'nullable|date',
            'gender' => 'nullable|in:Male,Female,Others',
            'marital_status' => 'nullable|in:Married,Unmarried',
            'address' => 'nullable|string',
            'is_lawyer' => 'nullable|boolean',
            'is_consultant' => 'nullable|boolean',
            'is_trainer' => 'nullable|boolean',
            'is_writer' => 'nullable|boolean',
            'photo' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
            'about' => 'nullable|string',
            'designation' => 'nullable|string|max:255',
            'workplace_name' => 'nullable|string|max:255',
        ]);


        if ($validator->fails()) {
            $notification = array(
                'message' => 'Something went wront!, Please try again.',
                'alert-type' => 'error'
            );
            return redirect()->back()->withErrors($validator)->withInput()->with($notification);
        }

        $user = User::find(auth()->id());

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->mobile = $request->input('mobile');
        $user->dob = $request->input('dob');
        $user->gender = $request->input('gender');
        $user->marital_status = $request->input('marital_status');

        $user->about = $request->input('about');
        $user->designation = $request->input('designation');
        $user->workplace_name = $request->input('workplace_name');

        $user->address = $request->input('address');
        $user->is_lawyer = $request->input('is_lawyer') ?? 0;
        $user->is_consultant = $request->input('is_consultant') ?? 0;
        $user->is_trainer = $request->input('is_trainer') ?? 0;
        $user->is_writer = $request->input('is_writer') ?? 0;

        if ($request->hasFile('photo')) {
            if ($user->photo) {
                deleteFile($user->photo);
            }
            $user->photo = uploadFile($request->file('photo'), 'user');
        }

        $user->save();

        $notification = array(
            'message' => 'Successfully profile updated!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function security()
    {
        return view('admin.profile.security');
    }
    public function update_password(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'current_password' => 'required',
            'new_password' => 'min:8|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:8'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('error', 'Something went wront!, Please try again.');
        }

        if (Auth::attempt(['id' => Auth::user()->id, 'password' => $request->current_password])) {
            $user = User::find(Auth::user()->id);
            $user->password = bcrypt($request->new_password);
            $user->save();
            return redirect()->back()->with('success', 'Successfully password changed.');
        } else {
            $notification = array(
                'message' => 'Sorry! Your current password dost not match.',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function logout()
    {
        Auth::logout();
        $notification = array(
            'message' => 'Successfully Logged Out!',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }
}
