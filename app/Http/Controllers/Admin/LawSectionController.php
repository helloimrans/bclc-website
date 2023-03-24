<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LawSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class LawSectionController extends Controller
{

    public function get($id){
        $data = LawSection::where('law_chapter_id',$id)->where('status',1)->get();
        return response()->json($data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required_without:title_bn',
            'title_bn' => 'required_without:title',
            'section_no' => 'required_without:section_no_bn',
            'section_no_bn' => 'required_without:section_no',
            'description' => 'required_without:description_bn',
            'description_bn' => 'required_without:description',
            'sort' => 'numeric|min:0',
        ]);

        $data = new LawSection();

        $data->parent_id      = $request->parent_id;
        $data->law_id         = $request->law_id;
        $data->law_chapter_id = $request->chapter_id;
        $data->section_no     = $request->section_no;
        $data->section_no_bn  = $request->section_no_bn;
        $data->title          = $request->title;
        $data->title_bn       = $request->title_bn;
        $data->description    = $request->description;
        $data->description_bn = $request->description_bn;
        $data->slug           = '';
        $data->sort           = $request->sort;
        $data->is_act         = $request->s_is_act;
        $data->is_rules       = $request->s_is_rules;
        $data->status         = $request->status;
        $data->created_by     = Auth::guard('admin')->user()->id;
        $data->save();

        $genSlug = LawSection::find($data->id);
        $genSlug->slug = Str::slug($request->title) . $data->id;
        $genSlug->save();

        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = LawSection::find($id);
        $parent_section = LawSection::where('law_chapter_id',$data->law_chapter_id)->where('id', '!=', $id)->get();
        return response()->json([
            'section' => $data,
            'parent' => $parent_section
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required_without:title_bn',
            'title_bn' => 'required_without:title',
            'section_no' => 'required_without:section_no_bn',
            'section_no_bn' => 'required_without:section_no',
            'description' => 'required_without:description_bn',
            'description_bn' => 'required_without:description',
            'sort' => 'numeric|min:0',
        ]);

        $data =  LawSection::find($id);
        $data->parent_id      = $request->parent_id;
        $data->section_no     = $request->section_no;
        $data->section_no_bn  = $request->section_no_bn;
        $data->title          = $request->title;
        $data->title_bn       = $request->title_bn;
        $data->description    = $request->description;
        $data->description_bn = $request->description_bn;
        $data->slug           = Str::slug($request->title) . $data->id;
        $data->sort           = $request->sort;
        $data->status         = $request->status;
        $data->updated_by     = Auth::guard('admin')->user()->id;
        $data->save();

        return response()->json($data);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = LawSection::find($id);
        $data->deleted_by = Auth::guard('admin')->user()->id;
        $data->save();
        $true = $data->delete();
        return response()->json($true);
    }
}
