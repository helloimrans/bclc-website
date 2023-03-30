<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OfficeFunctionCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class OfficeFunctionCatController extends Controller
{
    public function index()
    {
        $data['of_categories'] = OfficeFunctionCategory::with('createdBy')->latest()->get();
        return view('admin.office_function_category.index', $data);
    }
    public function create()
    {
        return view('admin.office_function_category.create');
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:office_function_categories,name',
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
        OfficeFunctionCategory::create($input);
        $notification = array(
            'message' => 'Successfully office & function category created.',
            'alert-type' => 'success'
        );
        return redirect()->route('of.category.index')->with($notification);
    }
    public function show($id)
    {
    }
    public function edit($id)
    {
        $data['of_category'] = OfficeFunctionCategory::findOrFail($id);
        return view('admin.office_function_category.edit', $data);
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:office_function_categories,name,' . $id,
        ]);

        if ($validator->fails()) {
            $notification = array(
                'message' => 'Something went wront!, Please try again.',
                'alert-type' => 'error'
            );
            return redirect()->back()->withErrors($validator)->withInput()->with($notification);
        }

        $input = $request->all();
        $data = OfficeFunctionCategory::find($id);
        $input['updated_by'] = Auth::guard('admin')->user()->id;

        $data->update($input);
        $notification = array(
            'message' => 'Successfully office & function category updated.',
            'alert-type' => 'success'
        );
        return redirect()->route('of.category.index')->with($notification);
    }
    public function destroy($id)
    {
        OfficeFunctionCategory::find($id)->delete();
        $notification = array(
            'message' => 'Successfully deleted.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }


}
