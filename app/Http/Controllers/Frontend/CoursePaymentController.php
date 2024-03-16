<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\CourseOrderDetail;
use App\Models\Order;
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

        return response()->json($order);
    }

    public function paymentSuccess($transactionId){
        $order = Order::where('transaction_id', $transactionId)->first();
        if($order){
            return view('frontend.enroll.success');
        }else{
            return redirect('/');
        }
    }
}
