<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SettingsController extends Controller
{
    public function index(){
        $data['setting'] = Setting::latest()->first();
        return view('admin.settings.edit', $data);
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
            'bkash_number' => 'required',
            'bkash_account_type' => 'required',
        ]);

        if($validator->fails()){
            $notification = array(
                'message' => 'Something went wront!, Please try again.',
                'alert-type' => 'error'
            );
            return redirect()->back()->withErrors($validator)->withInput()->with($notification);
        }

        $input = $request->except('_token');
        
        $setting = Setting::latest()->first();
        if($setting){
            $setting->update($input);

        }else{
            Setting::create($input);
        }

        $notification = array(
            'message' => 'Successfully settings created.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }
}
