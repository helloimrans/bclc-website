<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ServiceCatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['categories'] = ServiceCategory::latest()->get();
        return view('admin.service_category.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.service_category.create');
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
            'name' => 'required|unique:service_categories,name',
            'image' => 'mimes:jpg,jpeg,png,webpp,svg',
            'sort' => 'nullable|numeric|min:0',
            'is_service' => 'required_without:is_pro_bono',
            'is_pro_bono' => 'required_without:is_service'
        ]);

        if($validator->fails()){
            $notification = array(
                'message' => 'Something went wront!, Please try again.',
                'alert-type' => 'error'
            );
            return redirect()->back()->withErrors($validator)->withInput()->with($notification);
        }

        $input = $request->all();

        if(isset($input['image'])){
            $input['image'] = uploadFile($input['image'], 'service_category');
        }

        $input['slug'] = Str::slug($request->name);
        $input['created_by'] = Auth::user()->id;

        if($request->is_service == null){
            $input['is_service'] = null;
        }else{
            $input['is_service'] = $request->is_service;
        }
        if($request->is_pro_bono == null){
            $input['is_pro_bono'] = null;
        }else{
            $input['is_pro_bono'] = $request->is_pro_bono;
        }

        ServiceCategory::create($input);

        $notification = array(
            'message' => 'Successfully service category created.',
            'alert-type' => 'success'
        );
        return redirect()->route('service.category.index')->with($notification);
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
        $data['category'] = ServiceCategory::find($id);
        return view('admin.service_category.edit',$data);
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
        $validator = Validator::make($request->all(),[
            'name' => 'required|unique:service_categories,name,'.$id,
            'image' => 'mimes:jpg,jpeg,png,webpp,svg',
            'sort' => 'nullable|numeric|min:0',
            'is_service' => 'required_without:is_pro_bono',
            'is_pro_bono' => 'required_without:is_service'
        ]);

        if($validator->fails()){
            $notification = array(
                'message' => 'Something went wront!, Please try again.',
                'alert-type' => 'error'
            );
            return redirect()->back()->withErrors($validator)->withInput()->with($notification);
        }

        $input = $request->all();
        $data = ServiceCategory::find($id);

        if(isset($input['image'])){
            if($data->image){
                deleteFile($data->image);
            }
            $input['image'] = uploadFile($input['image'], 'service_category');
        }


        $input['slug'] = Str::slug($request->name);
        $input['updated_by'] = Auth::user()->id;

        if($request->is_service == null){
            $input['is_service'] = null;
        }else{
            $input['is_service'] = $request->is_service;
        }
        if($request->is_pro_bono == null){
            $input['is_pro_bono'] = null;
        }else{
            $input['is_pro_bono'] = $request->is_pro_bono;
        }

        $data->update($input);

        $notification = array(
            'message' => 'Successfully service category updated.',
            'alert-type' => 'success'
        );
        return redirect()->route('service.category.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = ServiceCategory::find($id);
        $data->deleted_by = Auth::user()->id;
        $data->save();
        $data->delete();
        $notification = array(
            'message' => 'Successfully deleted.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
