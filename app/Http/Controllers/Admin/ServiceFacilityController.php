<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\ServiceFacilityCategory;
use App\Models\ServiceFacility;

class ServiceFacilityController extends Controller
{
    public function index()
    {
        $data['service_facilitics'] = ServiceFacility::with(['createdBy', 'serviceFacilityCategory'])->latest()->get();
        return view('admin.service_facility.index', $data);
    }
    public function create()
    {
        $data['service_facility_cats'] = ServiceFacilityCategory::where('status', 1)->all();
        return view('admin.service_facility.create', $data);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'service_facility_category_id' => 'required',
            'service' => 'required',
            'title' => 'required',
            'description' => 'required',
            'authority' => 'required',
            'contact_info' => 'required',
            'source_link' => 'required',
            // 'file' => 'required|csv,txt,xlx,xls,pdf|max:2048',
            'file' => 'required|mimes:pdf',
        ]);
        if ($validator->fails()) {
            $notification = array(
                'message' => 'Something went wront!, Please try again.',
                'alert-type' => 'error'
            );
            return redirect()->back()->withErrors($validator)->withInput()->with($notification);
        }

        $data = new ServiceFacility();

        $data->service_facility_category_id = $request->service_facility_category_id;
        $data->service                      = $request->service;
        $data->title                        = $request->title;
        $data->description                  = $request->description;
        $data->authority                    = $request->authority;
        $data->contact_info                 = $request->contact_info;
        $data->source_link                  = $request->source_link;
        $data->status                       = $request->status;
        $data->created_by                   = Auth::guard('admin')->user()->id;

        $file = $request->file('file');
        if ($file) {
            $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploaded/service_&_facility'), $fileName);
            $data->file = '/uploaded/service_&_facility/' . $fileName;
        }
        $data->save();

        $notification = array(
            'message' => 'Successfully service & facility created.',
            'alert-type' => 'success'
        );
        return redirect()->route('service-&-facility.index')->with($notification);
    }
    public function show($id)
    {
    }
    public function edit($id)
    {
        $data['service_facility_cats'] = ServiceFacilityCategory::where('status', 1)->all();
        $data['service_facility'] = ServiceFacility::findOrFail($id);
        return view('admin.service_facility.edit', $data);
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'service_facility_category_id' => 'required',
            'service' => 'required',
            'title' => 'required',
            'description' => 'required',
            'authority' => 'required',
            'contact_info' => 'required',
            'source_link' => 'required',
            // 'file' => 'required|csv,txt,xlx,xls,pdf|max:2048',
            'file' => 'required|mimes:pdf',
        ]);

        if ($validator->fails()) {
            $notification = array(
                'message' => 'Something went wront!, Please try again.',
                'alert-type' => 'error'
            );
            return redirect()->back()->withErrors($validator)->withInput()->with($notification);
        }
        $data = ServiceFacility::findOrFail($id);

        $data->service_facility_category_id = $request->service_facility_category_id;
        $data->service                      = $request->service;
        $data->title                        = $request->title;
        $data->description                  = $request->description;
        $data->authority                    = $request->authority;
        $data->contact_info                 = $request->contact_info;
        $data->source_link                  = $request->source_link;
        $data->status                       = $request->status;
        $data->created_by                   = Auth::guard('admin')->user()->id;

        $file = $request->file('file');
        if ($file) {
            $file_path = public_path($data->file);
            @unlink($file_path);
            $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploaded/service_&_facility'), $fileName);
            $data->file = '/uploaded/service_&_facility/' . $fileName;
        }
        $data->update();

        $notification = array(
            'message' => 'Successfully service & facility updated.',
            'alert-type' => 'success'
        );
        return redirect()->route('service-&-facility.index')->with($notification);
    }
    public function destroy($id)
    {
        ServiceFacility::find($id)->delete();
        $notification = array(
            'message' => 'Successfully deleted.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}