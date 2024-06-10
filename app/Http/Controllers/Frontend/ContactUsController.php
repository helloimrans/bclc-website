<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ContactUsController extends Controller
{
    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => 'required|max:255',
            'mobile' => 'required|max:11|min:11',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        if($validator->fails()){
            $notification = array(
                'message' => 'Something went wront!, Please try again.',
                'alert-type' => 'error'
            );
            return redirect()->back()->withErrors($validator)->withInput()->with($notification);
        }

        ContactUs::create($request->all());
        Session::flash('success','Message Sent!');

        $notification = array(
            'message' => 'Message Sent.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
