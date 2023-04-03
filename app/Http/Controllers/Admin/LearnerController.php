<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Learner;
use Illuminate\Http\Request;

class LearnerController extends Controller
{
    
    public function index()
    {
        $data['learner_list'] = Learner::latest()->get();

        return view('Admin.learner_list.index',$data);
    }
}
