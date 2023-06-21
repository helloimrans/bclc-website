<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CourseOrderDetail;

class EnrolledCouseController extends Controller
{
    public function index(){
        $data['enrolledCourses'] = CourseOrderDetail::with(['courses'])->get()->unique('course_id');
        return view('admin.enrolled _course.index',$data);
    }
    public function details($id){
        $data['enrolledCourseDetails'] = CourseOrderDetail::with(['order'])->where('course_id', $id)->get();
        return view('admin.enrolled _course.details',$data);
    }
}
