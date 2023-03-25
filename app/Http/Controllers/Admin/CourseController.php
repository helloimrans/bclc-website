<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\SuitableForCourse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function suitableForCourse()
    {
        $data['suitables'] = SuitableForCourse::with('admin')->latest()->get();
        return view('admin.suitable_for_course.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function suitableCreate()
    {
        $data['suitables'] = SuitableForCourse::all();
        return view('admin.suitable_for_course.create', $data);
    }
    public function suitableStore(Request $request)
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
        $input['created_by'] = Auth::guard('admin')->user()->id;
        SuitableForCourse::create($input);
        $notification = array(
            'message' => 'Successfully course suitable created.',
            'alert-type' => 'success'
        );
        return redirect()->route('course.suitables.index')->with($notification);
    }
    public function suitableEdit($id)
    {
        $data['suitable'] = SuitableForCourse::findOrFail($id);
        return view('admin.suitable_for_course.edit', $data);
    }
    public function suitableUpdate(Request $request, $id)
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
        $input['updated_by'] = Auth::guard('admin')->user()->id;

        $data->update($input);
        $notification = array(
            'message' => 'Successfully course suitable updated.',
            'alert-type' => 'success'
        );
        return redirect()->route('course.suitables.index')->with($notification);
    }
    public function suitableDelete($id)
    {
        SuitableForCourse::find($id)->delete();
        $notification = array(
            'message' => 'Successfully deleted.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}