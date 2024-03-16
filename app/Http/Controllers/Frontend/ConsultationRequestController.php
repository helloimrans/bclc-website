<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ConsultationRequest;
use Illuminate\Http\Request;

class ConsultationRequestController extends Controller
{
    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|max:255',
            'description' => 'required',
            'file' => 'mimes:pdf,docx,png,jpg,jpeg',
        ]);

        $input = $request->all();
        $input['status'] = 0;


        if(isset($input['file'])){
            $input['file'] = uploadFile($input['file'], 'request_consultation');
        }

       $data =  ConsultationRequest::create($input);
       return response()->json($data);

    }
}
