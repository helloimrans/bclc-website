<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\OfficeCategory;
use Illuminate\Http\Request;
class OfficeCategoryController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data['categories'] = LawCategory::latest()->get();
         return view('admin.office_category.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.office_category.create');

    }


    public function store(Request $request)
    {
        
        $category = new OfficeCategory();

        $category->name = $request->name;
        $category->sort = $request->sort;
        $category->status = $request->status;
        
        $category->save();

       // return redirect()->route('office.category.index')->with($notification);
    }


}
