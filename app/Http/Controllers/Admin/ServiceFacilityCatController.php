<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\ServiceFacilityCategory;


class ServiceFacilityCatController extends Controller
{
    public function index()
    {
        $data['sf_categories'] = ServiceFacilityCategory::with('createdBy')->latest()->get();
        return view('admin.service_facility_category.index', $data);
    }
    public function create()
    {
        return view('admin.service_facility_category.create');
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:service_facility_categories,name',
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
        ServiceFacilityCategory::create($input);
        $notification = array(
            'message' => 'Successfully service & facility category created.',
            'alert-type' => 'success'
        );
        return redirect()->route('sf.category.index')->with($notification);
    }
    public function show($id)
    {
    }
    public function edit($id)
    {
        $data['sf_category'] = ServiceFacilityCategory::findOrFail($id);
        return view('admin.service_facility_category.edit', $data);
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:service_facility_categories,name,' . $id,
        ]);

        if ($validator->fails()) {
            $notification = array(
                'message' => 'Something went wront!, Please try again.',
                'alert-type' => 'error'
            );
            return redirect()->back()->withErrors($validator)->withInput()->with($notification);
        }

        $input = $request->all();
        $data = ServiceFacilityCategory::find($id);
        $input['updated_by'] = Auth::user()->id;

        $data->update($input);
        $notification = array(
            'message' => 'Successfully service & facility category updated.',
            'alert-type' => 'success'
        );
        return redirect()->route('sf.category.index')->with($notification);
    }
    public function destroy($id)
    {
        ServiceFacilityCategory::find($id)->delete();
        $notification = array(
            'message' => 'Successfully data deleted.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
