<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\privacyPolicy;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class PrivacyPolicyController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //  $data['services'] = TermsCondition::latest()->get();
        return view('admin.privacy_policy_settings.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin.privacy_policy_settings.create');
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(Request $request)
     {
        $validator = Validator::make($request->all(),[
            'description' => 'required',
        ]);

        if($validator->fails()){
            $notification = array(
                'message' => 'Something went wront!, Please try again.',
                'alert-type' => 'error'
            );
            return redirect()->back()->withErrors($validator)->withInput()->with($notification);
        }

        $input = $request->all();
        $input['slug'] = Str::slug($request->title);
        $input['created_by'] = Auth::guard('admin')->user()->id;
        privacyPolicy::create($input);
        $notification = array(
            'message' => 'Successfully associated service created.',
            'alert-type' => 'success'
        );
        return redirect()->route('associated.service.index')->with($notification);
     }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $data['service'] = TermsCondition::find($id);
        // return view('admin.associated_service.edit',$data);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    //     $validator = Validator::make($request->all(),[
    //         'description' => 'required',
    //     ]);

    //     if($validator->fails()){
    //         $notification = array(
    //             'message' => 'Something went wront!, Please try again.',
    //             'alert-type' => 'error'
    //         );
    //         return redirect()->back()->withErrors($validator)->withInput()->with($notification);
    //     }

    //     $input = $request->all();
    //     $data = privacyPolicy::find($id);
    //     $input['slug'] = Str::slug($request->title);
    //     $input['updated_by'] = Auth::guard('admin')->user()->id;

    //     $data->update($input);
    //     $notification = array(
    //         'message' => 'Successfully associated service updated.',
    //         'alert-type' => 'success'
    //     );
    //     return redirect()->route('associated.service.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // privacyPolicy::find($id)->delete();
        // $notification = array(
        //     'message' => 'Successfully deleted.',
        //     'alert-type' => 'success'
        // );
        // return redirect()->back()->with($notification);
    }
}
