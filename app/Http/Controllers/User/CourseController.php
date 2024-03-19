<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\CourseOrderDetail;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function index(){
        $data['courseOrderDetails'] = CourseOrderDetail::with(['courses', 'order:id,status'])->where('user_id', Auth::user()->id)->get();
        return view('user.courses.index',$data);
    }
}
