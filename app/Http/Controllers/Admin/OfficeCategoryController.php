<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\OfficeCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class OfficeCategoryController extends Controller
{
    public function index()
    {
        $data['office_function_cats'] = OfficeCategory::with('createdBy')->latest()->get();
        return view('admin.office_function_category.index', $data);
    }
    public function create()
    {
        return view('admin.office_function_category.create');
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:office_categories,name',
            'sort' => 'required'
        ]);

        if ($validator->fails()) {
            $notification = array(
                'message' => 'Something went wront!, Please try again.',
                'alert-type' => 'error'
            );
            return redirect()->back()->withErrors($validator)->withInput()->with($notification);
        }
        $input = $request->all();
        $input['created_by'] = Auth::guard('admin')->user()->id;
        OfficeCategory::create($input);
        $notification = array(
            'message' => 'Successfully office & function category created.',
            'alert-type' => 'success'
        );
        return redirect()->route('office.category.index')->with($notification);
    }
    public function show($id)
    {
    }
    public function edit($id)
    {
        $data['of_cat'] = OfficeCategory::findOrFail($id);
        return view('admin.office_function_category.edit', $data);
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:office_categories,name,' . $id,
            'sort' => 'required'
        ]);

        if ($validator->fails()) {
            $notification = array(
                'message' => 'Something went wront!, Please try again.',
                'alert-type' => 'error'
            );
            return redirect()->back()->withErrors($validator)->withInput()->with($notification);
        }

        $input = $request->all();
        $data = OfficeCategory::find($id);
        $input['updated_by'] = Auth::guard('admin')->user()->id;

        $data->update($input);
        $notification = array(
            'message' => 'Successfully office & function category updated.',
            'alert-type' => 'success'
        );
        return redirect()->route('office.category.index')->with($notification);
    }
    public function destroy($id)
    {
        OfficeCategory::find($id)->delete();
        $notification = array(
            'message' => 'Successfully deleted.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }


}
