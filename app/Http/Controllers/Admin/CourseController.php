<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SuitableForCourse;
use App\Models\ServiceCategory;
use App\Models\Service;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class CourseController extends Controller
{

    public function index()
    {
        $data['courses'] = Course::with(['createdBy', 'service', 'serviceCategory'])->get();
        return view('admin.course.index', $data);
    }

    public function create()
    {
        $data['suitables'] = SuitableForCourse::where('status', 1)->get();
        $data['services'] = Service::where('status', 1)->get();
        $data['service_categories'] = ServiceCategory::where('status', 1)->get();
        return view('admin.course.create', $data);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'course_id' => 'required',
            'title' => 'required|unique:courses,title,' . $request->title,
            'fee' => 'required',
            'service_category_id' => 'required:suitable_for_courses,id,' . $request->service_category_id,
            'service_id' => 'required:services,id,' . $request->service_id,
            'expert_id' => 'required',
        ]);

        if ($validator->fails()) {
            $notification = array(
                'message' => 'Something went wront!, Please try again.',
                'alert-type' => 'error'
            );
            return redirect()->back()->withErrors($validator)->withInput()->with($notification);
        }
        $input = $request->all();

        $image = $request->file('image');
        if ($image) {
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploaded/courses'), $imageName);
            $input['image'] = '/uploaded/courses/' . $imageName;
        }

        $input['slug'] = Str::slug($request->title);
        $input['schedule'] = json_encode($request->schedule);
        $input['suitable_course'] = json_encode($request->suitable_course);
        $input['created_by'] = Auth::guard('admin')->user()->id;

        Course::create($input);

        $notification = array(
            'message' => 'Successfully service category created.',
            'alert-type' => 'success'
        );
        return redirect()->route('courses.index')->with($notification);
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {
    }
    public function destroy($id)
    {
    }
}