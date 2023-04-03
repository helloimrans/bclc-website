<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Expert;

class ExpartController extends Controller
{
    public function index()
    {
        $data['expart_list'] = Expert::latest()->get();

        return view('Admin.expart_list.index',$data);
    }
}
