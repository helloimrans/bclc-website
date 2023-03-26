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