<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CourseOrderDetail;
use App\Models\Order;
use App\Models\User;
use App\Notifications\GeneralNotification;

class EnrolledCouseController extends Controller
{
    public function index()
    {
        $data['enrolledCourses'] = CourseOrderDetail::with(['courses'])->get()->unique('course_id');
        return view('admin.enrolled _course.index', $data);
    }
    public function details($id)
    {
        $data['enrolledCourseDetails'] = CourseOrderDetail::with(['order'])->where('course_id', $id)->get();
        return view('admin.enrolled _course.details', $data);
    }
    public function approve($orderId)
    {
        $order = Order::findOrFail($orderId);
        $order->update([
            'status' => 'Complete'
        ]);

        $notify = [
            'heading' => 'Payment Approved',
            'text' => "Your payment has been approved.",
            'url' => '',
        ];

        $order->user->notify(new GeneralNotification($notify));


        return redirect()->back()->with([
            'message' => 'Payment Approved.',
            'alert-type' => 'success'
        ]);
    }
}
