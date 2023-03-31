<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\ServiceFacilityCategory;
use App\Models\ServiceFacility;
use App\Models\ServiceFacilitySector;

class ServiceFacilityController extends Controller
{
    public function index()
    {
        $data['service_facilitics'] = ServiceFacility::with(['createdBy', 'category'])->latest()->get();
        return view('admin.service_facility.index', $data);
    }
    public function create()
    {
        $data['sf_categories'] = ServiceFacilityCategory::where('status', 1)->get();
        $data['sf_sectors'] = ServiceFacilitySector::where('status', 1)->get();
        return view('admin.service_facility.create', $data);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'service_facility_sector_id' => 'required',
            'service_facility_category_id' => 'required',
            'title' => 'required',
            'description' => 'required',
        ]);
        if ($validator->fails()) {
            $notification = array(
                'message' => 'Something went wront!, Please try again.',
                'alert-type' => 'error'
            );
            return redirect()->back()->withErrors($validator)->withInput()->with($notification);
        }

        $data = new ServiceFacility();

        $data->service_facility_sector_id   = $request->service_facility_sector_id;
        $data->service_facility_category_id = $request->service_facility_category_id;
        $data->service                      = $request->service;
        $data->title                        = $request->title;
        $data->description                  = $request->description;
        $data->authority                    = $request->authority;

        $data->communications               = $request->communications;
        $data->sort                         = $request->sort;

        $data->status                       = $request->status;
        $data->created_by                   = Auth::guard('admin')->user()->id;

        $file = $request->file('file');
        if ($file) {
            $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploaded/service_facility'), $fileName);
            $data->file = '/uploaded/service_facility/' . $fileName;
        }
        $data->save();

        $notification = array(
            'message' => 'Successfully service & facility created.',
            'alert-type' => 'success'
        );
        return redirect()->route('service.facility.index')->with($notification);
    }
    public function show($id)
    {
    }
    public function edit($id)
    {
        $data['sf_categories'] = ServiceFacilityCategory::where('status', 1)->get();
        $data['sf_sectors'] = ServiceFacilitySector::where('status', 1)->get();
        $data['service_facility'] = ServiceFacility::findOrFail($id);
        return view('admin.service_facility.edit', $data);
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'service_facility_sector_id' => 'required',
            'service_facility_category_id' => 'required',
            'title' => 'required',
            'description' => 'required',
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

        $data->communications               = $request->communications;
        $data->sort                         = $request->sort;

        $data->status                       = $request->status;
        $data->updated_by                   = Auth::guard('admin')->user()->id;

        $file = $request->file('file');
        if ($file) {
            $file_path = public_path($data->file);
            @unlink($file_path);
            $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploaded/service_facility'), $fileName);
            $data->file = '/uploaded/service_facility/' . $fileName;
        }
        $data->update();

        $notification = array(
            'message' => 'Successfully service & facility updated.',
            'alert-type' => 'success'
        );
        return redirect()->route('service.facility.index')->with($notification);
    }
    public function destroy($id)
    {
        ServiceFacility::find($id)->delete();
        $notification = array(
            'message' => 'Successfully data deleted.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
