<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactUs;

class ContactMessageController extends Controller
{
    
    public function index()
    {
        $data['contact_messages'] = ContactUs::latest()->get();

        return view('admin.contact_message.index',$data);
    }

}
