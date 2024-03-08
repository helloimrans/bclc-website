<?php

namespace App\Http\Controllers\Admin;

use App\Models\Course;
use App\Models\Expert;
use App\Models\Service;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ServiceCategory;
use App\Models\SuitableForCourse;
use App\Models\CourseFaq;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CourseController extends Controller
{

    public function index()
    {
        $data['courses'] = Course::with(['createdBy', 'service', 'serviceCategory', 'expert'])->get();
        return view('admin.course.index', $data);
    }

    public function create()
    {
        $data['experts'] = Expert::where('status', 1)->get();
        $data['suitables'] = SuitableForCourse::where('status', 1)->get();
        $data['services'] = Service::where('status', 1)->get();
        $data['service_categories'] = ServiceCategory::where('status', 1)->get();
        return view('admin.course.create', $data);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:courses,title',
            'fee' => 'required',
            'service_category_id' => 'required',
            'service_id' => 'required',
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

        /*Course ID number*/
        $lastCourse = Course::latest()->first();
        if ($lastCourse) {
            $lastIncreament = substr($lastCourse->course_id, -2);
            $newId = 'BCLC-' . date('dmy') . str_pad($lastIncreament + 1, 2, 0, STR_PAD_LEFT);
        } else {
            $newId = 'BCLC-' . date('dmy') . str_pad(0 + 1, 2, 0, STR_PAD_LEFT);
        }
        $input['course_id'] = $newId;

        // $image = $request->file('image');
        // if ($image) {
        //     $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
        //     $image->move(public_path('uploaded/courses'), $imageName);
        //     $input['image'] = '/uploaded/courses/' . $imageName;
        // }
       
        // $image = $request->file('certificate_image');
        // if ($image) {
        //     $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
        //     $image->move(public_path('uploaded/courses/'), $imageName);
        //     $input['certificate_image'] = '/uploaded/courses/' . $imageName;
        // }
        $input['image'] = uploadFile($input['image'], 'courses');
        $input['certificate_image'] = uploadFile($input['certificate_image'], 'courses');

        $input['slug'] = Str::slug($request->title);
        $input['schedule'] = json_encode($request->schedule);
        $input['suitable_course'] = json_encode($request->suitable_course);
        $input['created_by'] = Auth::user()->id;

        Course::create($input);

        $notification = array(
            'message' => 'Successfully service category created.',
            'alert-type' => 'success'
        );
        return redirect()->route('courses.index')->with($notification);
    }

    public function show($id)
    {
        $data['course'] = Course::findOrFail($id);
        return view('admin.course.show', $data);
    }

    public function edit($id)
    {
        $data['course'] = Course::findOrFail($id);
        $data['faqs'] = CourseFaq::where('course_id', $id)->get();
        // return $data['course']->schedule;
        $data['experts'] = Expert::where('status', 1)->get();
        $data['suitables'] = SuitableForCourse::where('status', 1)->get();
        $data['services'] = Service::where('status', 1)->get();
        $data['service_categories'] = ServiceCategory::where('status', 1)->get();
        return view('admin.course.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:courses,title,' . $id,
            'fee' => 'required',
            'service_category_id' => 'required',
            'service_id' => 'required',
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
        $data = Course::find($id);

        // $image = $request->file('image');
        // if ($image) {
        //     $image_path = public_path($data->image);
        //     @unlink($image_path);
        //     $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
        //     $image->move(public_path('uploaded/courses'), $imageName);
        //     $input['image'] = '/uploaded/courses/' . $imageName;
        // }
        // $image = $request->file('certificate_image');
        // if ($image) {
        //     $image_path = public_path($data->image);
        //     @unlink($image_path);
        //     $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
        //     $image->move(public_path('uploaded/courses'), $imageName);
        //     $input['certificate_image'] = '/uploaded/courses/' . $imageName;
        // }

        $input['image'] = uploadFile($input['image'], 'courses');
        $input['certificate_image'] = uploadFile($input['certificate_image'], 'courses');

        $input['slug'] = Str::slug($request->title);
        $input['schedule'] = json_encode($request->schedule);
        $input['suitable_course'] = json_encode($request->suitable_course);
        $input['created_by'] = Auth::user()->id;

        $data->update($input);

        $notification = array(
            'message' => 'Successfully service category created.',
            'alert-type' => 'success'
        );
        return redirect()->route('courses.index')->with($notification);
    }
    public function destroy($id)
    {
        $data = Course::find($id);
        $data->deleted_by = Auth::user()->id;
        $data->save();
        $data->delete();
        $notification = array(
            'message' => 'Successfully deleted.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}