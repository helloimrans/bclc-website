<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\CourseOrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function index(){
        $data['courseOrderDetails'] = CourseOrderDetail::with(['courses'])->where('user_id', Auth::user()->id)->get();
        return view('user.courses.index',$data);
    }
}