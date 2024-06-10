<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceFacilitySector;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ServiceFacilitySectorController extends Controller
{
    public function index()
    {
        $data['sf_sectors'] = ServiceFacilitySector::with('createdBy')->latest()->get();
        return view('admin.service_facility_sector.index', $data);
    }
    public function create()
    {
        return view('admin.service_facility_sector.create');
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:service_facility_sectors,name',
        ]);

        if ($validator->fails()) {
            $notification = array(
                'message' => 'Something went wront!, Please try again.',
                'alert-type' => 'error'
            );
            return redirect()->back()->withErrors($validator)->withInput()->with($notification);
        }
        $input = $request->all();
        $input['created_by'] = Auth::user()->id;
        ServiceFacilitySector::create($input);
        $notification = array(
            'message' => 'Successfully service & facility sector created.',
            'alert-type' => 'success'
        );
        return redirect()->route('sf.sector.index')->with($notification);
    }
    public function show($id)
    {
    }
    public function edit($id)
    {
        $data['sf_sector'] = ServiceFacilitySector::findOrFail($id);
        return view('admin.service_facility_sector.edit', $data);
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:service_facility_sectors,name,' . $id,
        ]);

        if ($validator->fails()) {
            $notification = array(
                'message' => 'Something went wront!, Please try again.',
                'alert-type' => 'error'
            );
            return redirect()->back()->withErrors($validator)->withInput()->with($notification);
        }

        $input = $request->all();
        $data = ServiceFacilitySector::find($id);
        $input['updated_by'] = Auth::user()->id;

        $data->update($input);
        $notification = array(
            'message' => 'Successfully service & facility sector updated.',
            'alert-type' => 'success'
        );
        return redirect()->route('sf.sector.index')->with($notification);
    }
    public function destroy($id)
    {
        ServiceFacilitySector::find($id)->delete();
        $notification = array(
            'message' => 'Successfully data deleted.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
