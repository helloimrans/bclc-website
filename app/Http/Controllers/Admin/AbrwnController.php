<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Abrwn;
use App\Models\AbrwnCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AbrwnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $data['abrwns'] = Abrwn::with('category')->latest()->get();
        return view('admin.abrwn.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.abrwn.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:abrwns,title',
            'thumbnail_image' => 'required|image|mimes:jpg,jpeg,png,webp,svg,gif|max:2048',
            'is_abrwn' => 'required',
            'abrwn_category_id' => 'required',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            $notification = array(
                'message' => 'Something went wront!, Please try again.',
                'alert-type' => 'error'
            );
            return redirect()->back()->withErrors($validator)->withInput()->with($notification);
        }

        $input = $request->all();

        $input['slug'] = Str::slug($request->title);
        $input['created_by'] = Auth::guard('admin')->user()->id;
        $input['guard_name'] = 'admin';

        $thumbnail_image = $request->file('thumbnail_image');
        if ($thumbnail_image) {
            $imageName = time() . '_' . uniqid() . '.' . $thumbnail_image->getClientOriginalExtension();
            $thumbnail_image->move(public_path('uploaded/service'), $imageName);
            $input['thumbnail_image'] = '/uploaded/service/' . $imageName;
        }

        Abrwn::create($input);

        $notification = array(
            'message' => 'Successfully abrwn created.',
            'alert-type' => 'success'
        );
        return redirect()->route('abrwn.index')->with($notification);
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
        $data['abrwn'] = Abrwn::find($id);
        if ($data['abrwn']->is_abrwn == 1) {
            $data['categories'] = AbrwnCategory::where('is_article', 1)->get();
        }elseif($data['abrwn']->is_abrwn == 2){
            $data['categories'] = AbrwnCategory::where('is_blog', 1)->get();
        }elseif($data['abrwn']->is_abrwn == 3){
            $data['categories'] = AbrwnCategory::where('is_review', 1)->get();
        }elseif($data['abrwn']->is_abrwn == 4){
            $data['categories'] = AbrwnCategory::where('is_writeup', 1)->get();
        }elseif($data['abrwn']->is_abrwn == 5){
            $data['categories'] = AbrwnCategory::where('is_news', 1)->get();
        }

        return view('admin.abrwn.edit', $data);
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
        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:abrwns,title,' . $id,
            'thumbnail_image' => 'image|mimes:jpg,jpeg,png,webp,svg,gif|max:2048',
            'is_abrwn' => 'required',
            'abrwn_category_id' => 'required',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            $notification = array(
                'message' => 'Something went wront!, Please try again.',
                'alert-type' => 'error'
            );
            return redirect()->back()->withErrors($validator)->withInput()->with($notification);
        }

        $data = Abrwn::find($id);
        $input = $request->all();

        $input['slug'] = Str::slug($request->title);
        $input['updated_by'] = Auth::guard('admin')->user()->id;

        $thumbnail_image = $request->file('thumbnail_image');
        if ($thumbnail_image) {
            $image_path = public_path($data->thumbnail_image);
            @unlink($image_path);
            $imageName = time() . '_' . uniqid() . '.' . $thumbnail_image->getClientOriginalExtension();
            $thumbnail_image->move(public_path('uploaded/abrwn'), $imageName);
            $input['thumbnail_image'] = '/uploaded/abrwn/' . $imageName;
        }

        $data->update($input);

        $notification = array(
            'message' => 'Successfully abrwn updated.',
            'alert-type' => 'success'
        );
        return redirect()->route('abrwn.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Abrwn::find($id);
        $data->deleted_by = Auth::guard('admin')->user()->id;
        $data->save();
        $data->delete();
        $notification = array(
            'message' => 'Successfully deleted.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
