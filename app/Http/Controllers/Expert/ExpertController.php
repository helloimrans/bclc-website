<?php

namespace App\Http\Controllers\Expert;

use App\Http\Controllers\Controller;
use App\Models\Expert;
use App\Models\Division;
use App\Models\District;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class ExpertController extends Controller
{

    public function registrationForm()
    {
        $data['userType'] = "Expert";
        return view('frontend.auth.registration', $data);
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

        $user = new Expert();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->mobile = $request->mobile;
        $user->is_lawyer = $request->is_lawyer;
        $user->is_consultant = $request->is_consultant;
        $user->is_trainer = $request->is_trainer;
        $user->is_writer = $request->is_writer;
        $user->password = bcrypt($request->password);
        $user->save();

        Auth::login($user);

        $notification = array(
            'message' => 'Registration Successfully!',
            'alert-type' => 'success'
        );
         return redirect()->intended(route('expert.dashboard'))->with($notification);
    }
    public function loginForm()
    {
        Redirect::setIntendedUrl(url()->previous());
        $data['userType'] = "Expert";
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
            return redirect()->intended(route('expert.dashboard'))->with($notification);
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



    public function profile()
    {
        $data['expert'] = Expert::find(Auth::user()->id);
        return view('expert.profile.profile', $data);
    }

    public function edit_profile()
    {
        $data['expert'] = Expert::find(Auth::user()->id);
        $data['divisions'] = Division::where('status', 1)->get();
        $data['districts'] = District::where('status', 1)->get();
        return view('expert.profile.edit_profile', $data);
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
        $data = Expert::find(Auth::user()->id);

        // $image = $request->file('image');
        // if ($image) {
        //     $image_path = public_path($data->image);
        //     @unlink($image_path);
        //     $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
        //     $image->move(public_path('uploaded/expert'), $imageName);
        //     $input['image'] = '/uploaded/expert/' . $imageName;
        // }
        
        // $image = $request->file('nid_passport_front');
        // if ($image) {
        //     $image_path = public_path($data->image);
        //     @unlink($image_path);
        //     $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
        //     $image->move(public_path('uploaded/expert'), $imageName);
        //     $input['nid_passport_front'] = '/uploaded/expert/' . $imageName;
        // }
        // $image = $request->file('nid_passport_back');
        // if ($image) {
        //     $image_path = public_path($data->image);
        //     @unlink($image_path);
        //     $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
        //     $image->move(public_path('uploaded/expert'), $imageName);
        //     $input['nid_passport_back'] = '/uploaded/expert/' . $imageName;
        // }
        $input['image'] = uploadFile($input['image'], 'expert');
        $input['nid_passport_front'] = uploadFile($input['nid_passport_front'], 'expert');
        $input['nid_passport_back'] = uploadFile($input['nid_passport_back'], 'expert');

        $input['specializations'] = json_encode($request->specializations);
        $input['updated_by'] = Auth::user()->id;

        $data->update($input);
        $notification = array(
            'message' => 'Successfully profile updated!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function security()
    {
        return view('expert.profile.security');
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

        if (Auth::attempt(['id' => Auth::user()->id, 'password' => $request->current_password])) {
            $user = Expert::find(Auth::user()->id);
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
        Auth::logout();
        $notification = array(
            'message' => 'Successfully Logged Out!',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }
}
