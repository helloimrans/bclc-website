<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OfficeFunctionSector;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class OfficeFunctionSectorController extends Controller
{
    public function index()
    {
        $data['of_sectors'] = OfficeFunctionSector::with('createdBy')->latest()->get();
        return view('admin.office_function_sector.index', $data);
    }
    public function create()
    {
        return view('admin.office_function_sector.create');
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:office_function_sectors,name',
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
        OfficeFunctionSector::create($input);
        $notification = array(
            'message' => 'Successfully office & function sector created.',
            'alert-type' => 'success'
        );
        return redirect()->route('of.sector.index')->with($notification);
    }
    public function show($id)
    {
    }
    public function edit($id)
    {
        $data['of_sector'] = OfficeFunctionSector::findOrFail($id);
        return view('admin.office_function_sector.edit', $data);
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:office_function_sectors,name,' . $id,
        ]);

        if ($validator->fails()) {
            $notification = array(
                'message' => 'Something went wront!, Please try again.',
                'alert-type' => 'error'
            );
            return redirect()->back()->withErrors($validator)->withInput()->with($notification);
        }

        $input = $request->all();
        $data = OfficeFunctionSector::find($id);
        $input['updated_by'] = Auth::user()->id;

        $data->update($input);
        $notification = array(
            'message' => 'Successfully office & function sector updated.',
            'alert-type' => 'success'
        );
        return redirect()->route('of.sector.index')->with($notification);
    }
    public function destroy($id)
    {
        OfficeFunctionSector::find($id)->delete();
        $notification = array(
            'message' => 'Successfully data deleted.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
