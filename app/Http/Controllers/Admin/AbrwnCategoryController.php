<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AbrwnCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AbrwnCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['categories'] = AbrwnCategory::latest()->get();
        return view('admin.abrwn_category.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.abrwn_category.create');
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
            'name' => 'required|unique:abrwn_categories,name',
            'image' => 'mimes:jpg,jpeg,png,webp,svg',
            'sort' => 'numeric|min:0',
            'is_article' => 'nullable|required_without_all:is_blog,is_review,is_writeup,is_news',
            'is_blog' => 'nullable|required_without_all:is_article,is_review,is_writeup,is_news',
            'is_review' => 'nullable|required_without_all:is_blog,is_article,is_writeup,is_news',
            'is_writeup' => 'nullable|required_without_all:is_blog,is_review,is_article,is_news',
            'is_news' => 'nullable|required_without_all:is_blog,is_review,is_writeup,is_article',
        ]);

        if ($validator->fails()) {
            $notification = array(
                'message' => 'Something went wront!, Please try again.',
                'alert-type' => 'error'
            );
            return redirect()->back()->withErrors($validator)->withInput()->with($notification);
        }

        $input = $request->all();

        $image = $request->file('image');
        if ($image) {
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploaded/abrwn'), $imageName);
            $input['image'] = '/uploaded/abrwn/' . $imageName;
        }

        $input['slug'] = Str::slug($request->name);
        $input['created_by'] = Auth::guard('admin')->user()->id;

        if ($request->is_article == null) {
            $input['is_article'] = null;
        } else {
            $input['is_article'] = $request->is_article;
        }
        if ($request->is_blog == null) {
            $input['is_blog'] = null;
        } else {
            $input['is_blog'] = $request->is_blog;
        }
        if ($request->is_review == null) {
            $input['is_review'] = null;
        } else {
            $input['is_review'] = $request->is_review;
        }
        if ($request->is_writeup == null) {
            $input['is_writeup'] = null;
        } else {
            $input['is_writeup'] = $request->is_writeup;
        }
        if ($request->is_news == null) {
            $input['is_news'] = null;
        } else {
            $input['is_news'] = $request->is_news;
        }

        AbrwnCategory::create($input);

        $notification = array(
            'message' => 'Successfully abrwn category created.',
            'alert-type' => 'success'
        );
        return redirect()->route('abrwn.category.index')->with($notification);
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
        $data['category'] = AbrwnCategory::find($id);
        return view('admin.abrwn_category.edit', $data);
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
            'name' => 'required|unique:abrwn_categories,name,'.$id,
            'image' => 'mimes:jpg,jpeg,png,webp,svg',
            'sort' => 'numeric|min:0',
            'is_article' => 'nullable|required_without_all:is_blog,is_review,is_writeup,is_news',
            'is_blog' => 'nullable|required_without_all:is_article,is_review,is_writeup,is_news',
            'is_review' => 'nullable|required_without_all:is_blog,is_article,is_writeup,is_news',
            'is_writeup' => 'nullable|required_without_all:is_blog,is_review,is_article,is_news',
            'is_news' => 'nullable|required_without_all:is_blog,is_review,is_writeup,is_article',
        ]);

        if ($validator->fails()) {
            $notification = array(
                'message' => 'Something went wront!, Please try again.',
                'alert-type' => 'error'
            );
            return redirect()->back()->withErrors($validator)->withInput()->with($notification);
        }

        $input = $request->all();
        $data = AbrwnCategory::find($id);

        $image = $request->file('image');
        if ($image) {
            $image_path = public_path($data->image);
            @unlink($image_path);
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploaded/abrwn'), $imageName);
            $input['image'] = '/uploaded/abrwn/' . $imageName;
        }

        $input['slug'] = Str::slug($request->name);
        $input['updated_by'] = Auth::guard('admin')->user()->id;

        if ($request->is_article == null) {
            $input['is_article'] = null;
        } else {
            $input['is_article'] = $request->is_article;
        }
        if ($request->is_blog == null) {
            $input['is_blog'] = null;
        } else {
            $input['is_blog'] = $request->is_blog;
        }
        if ($request->is_review == null) {
            $input['is_review'] = null;
        } else {
            $input['is_review'] = $request->is_review;
        }
        if ($request->is_writeup == null) {
            $input['is_writeup'] = null;
        } else {
            $input['is_writeup'] = $request->is_writeup;
        }
        if ($request->is_news == null) {
            $input['is_news'] = null;
        } else {
            $input['is_news'] = $request->is_news;
        }

        $data->update($input);

        $notification = array(
            'message' => 'Successfully abrwn category updated.',
            'alert-type' => 'success'
        );
        return redirect()->route('abrwn.category.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = AbrwnCategory::find($id);
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
