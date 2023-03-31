<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OfficeFunction;
use App\Models\OfficeFunctionCategory;
use App\Models\OfficeFunctionSector;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class OfficeFunctionController extends Controller
{
        public function index()
    {
        $data['office_functions'] = OfficeFunction::with(['createdBy', 'category'])->latest()->get();
        return view('admin.office_function.index', $data);
    }
    public function create()
    {
        $data['of_sectors'] = OfficeFunctionSector::where('status', 1)->get();
        $data['of_categories'] = OfficeFunctionCategory::where('status', 1)->get();
        return view('admin.office_function.create', $data);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'office_function_sector_id' => 'required',
            'office_function_category_id' => 'required',
            'title' => 'required',
            'service' => 'required',
        ]);
        if ($validator->fails()) {
            $notification = array(
                'message' => 'Something went wront!, Please try again.',
                'alert-type' => 'error'
            );
            return redirect()->back()->withErrors($validator)->withInput()->with($notification);
        }

        $data = new OfficeFunction();

        $data->office_function_sector_id    = $request->office_function_sector_id;
        $data->office_function_category_id  = $request->office_function_category_id;
        $data->title                        = $request->title;
        $data->description                  = $request->description;
        $data->service                      = $request->service;
        $data->ministry_dept_authority      = $request->ministry_dept_authority;
        $data->communications               = $request->communications;
        $data->sort                         = $request->sort;
        $data->address                      = $request->address;
        $data->status                       = $request->status;
        $data->created_by                   = Auth::guard('admin')->user()->id;

        $file = $request->file('file');
        if ($file) {
            $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploaded/office_function'), $fileName);
            $data->file = '/uploaded/office_function/' . $fileName;
        }
        $data->save();

        $notification = array(
            'message' => 'Successfully office function created.',
            'alert-type' => 'success'
        );
        return redirect()->route('office.function.index')->with($notification);
    }
    public function show($id)
    {
    }
    public function edit($id)
    {
        $data['of_sectors'] = OfficeFunctionSector::where('status', 1)->get();
        $data['of_categories'] = OfficeFunctionCategory::where('status', 1)->get();
        $data['office_function'] = OfficeFunction::findOrFail($id);
        return view('admin.office_function.edit', $data);
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'office_function_sector_id' => 'required',
            'office_function_category_id' => 'required',
            'title' => 'required',
            'service' => 'required',
        ]);

        if ($validator->fails()) {
            $notification = array(
                'message' => 'Something went wront!, Please try again.',
                'alert-type' => 'error'
            );
            return redirect()->back()->withErrors($validator)->withInput()->with($notification);
        }

        $data = OfficeFunction::findOrFail($id);

        $data->office_function_sector_id    = $request->office_function_sector_id;
        $data->office_function_category_id  = $request->office_function_category_id;
        $data->title                        = $request->title;
        $data->description                  = $request->description;
        $data->service                      = $request->service;
        $data->ministry_dept_authority      = $request->ministry_dept_authority;
        $data->communications               = $request->communications;
        $data->sort                         = $request->sort;
        $data->address                      = $request->address;
        $data->status                       = $request->status;
        $data->updated_by                   = Auth::guard('admin')->user()->id;

        $file = $request->file('file');
        if ($file) {
            $file_path = public_path($data->file);
            @unlink($file_path);
            $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploaded/office_function'), $fileName);
            $data->file = '/uploaded/office_function/' . $fileName;
        }
        $data->update();

        $notification = array(
            'message' => 'Successfully office function updated.',
            'alert-type' => 'success'
        );
        return redirect()->route('office.function.index')->with($notification);
    }
    public function destroy($id)
    {
        OfficeFunction::find($id)->delete();
        $notification = array(
            'message' => 'Successfully data deleted.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
