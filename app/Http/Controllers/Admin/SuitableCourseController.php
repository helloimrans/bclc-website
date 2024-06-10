<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SuitableForCourse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SuitableCourseController extends Controller
{
    public function index()
    {
        $data['suitables'] = SuitableForCourse::with('createdBy')->latest()->get();
        return view('admin.suitable_for_course.index', $data);
    }
    public function create()
    {
        return view('admin.suitable_for_course.create');
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:suitable_for_courses,name',
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
        SuitableForCourse::create($input);
        $notification = array(
            'message' => 'Successfully course suitable created.',
            'alert-type' => 'success'
        );
        return redirect()->route('course.suitables.index')->with($notification);
    }
    public function show($id)
    {
    }
    public function edit($id)
    {
        $data['suitable'] = SuitableForCourse::findOrFail($id);
        return view('admin.suitable_for_course.edit', $data);
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:suitable_for_courses,name,' . $id,
        ]);

        if ($validator->fails()) {
            $notification = array(
                'message' => 'Something went wront!, Please try again.',
                'alert-type' => 'error'
            );
            return redirect()->back()->withErrors($validator)->withInput()->with($notification);
        }

        $input = $request->all();
        $data = SuitableForCourse::find($id);
        $input['updated_by'] = Auth::user()->id;

        $data->update($input);
        $notification = array(
            'message' => 'Successfully course suitable updated.',
            'alert-type' => 'success'
        );
        return redirect()->route('course.suitables.index')->with($notification);
    }
    public function destroy($id)
    {
        SuitableForCourse::find($id)->delete();
        $notification = array(
            'message' => 'Successfully deleted.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}