<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\CourseOrderDetail;
use App\Models\Order;
use App\Models\User;
use App\Notifications\GeneralNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CoursePaymentController extends Controller
{
    public function paymentSubmit(Request $request)
    {
        $request->validate([
            'user_account_number' => 'required',
            'transaction_id' => 'required|unique:orders,transaction_id',
            'amount' => 'required',
        ]);

        $order = new Order();

        $order->user_id = Auth::user()->id;
        $order->invoice_no = $request->invoice_no;
        $order->purpose_of_payment = 'Course Payment';
        $order->payment_method = 'Bkash';
        $order->account_number = $request->account_number;
        $order->user_account_number = $request->user_account_number;
        $order->amount = $request->amount;
        $order->transaction_id = $request->transaction_id;
        $order->currency = 'BDT';
        $order->save();


        $courseOrderDetails = new CourseOrderDetail();
        $courseOrderDetails->user_id = Auth::user()->id;
        $courseOrderDetails->order_id = $order->id;
        $courseOrderDetails->course_id = base64_decode($request->course_id);

        $courseOrderDetails->save();

        $notify = [
            'heading' => 'Received Payment',
            'text' => "You've successfully received a payment for course.",
            'url' => '',
        ];

        $adminUsers = User::where('user_type', User::ADMIN)->get();
        foreach($adminUsers as $admin){
            $admin->notify(new GeneralNotification($notify));
        }

        return response()->json($order);
    }

    public function paymentSuccess($transactionId){
        if (Auth::check() && Auth::user()->user_type == User::NORMAL_USER) {
            $order = Order::where('transaction_id', $transactionId)->first();
            if($order){
                return view('frontend.enroll.success');
            }else{
                return redirect('/');
            }
        } else {
            $notification = array(
                'message' => 'Please at first login as a user.',
                'alert-type' => 'info'
            );
            return redirect()->back()->with($notification);
        }
    }
}
