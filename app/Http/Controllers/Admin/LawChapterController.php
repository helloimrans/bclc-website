<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LawChapter;
use App\Models\LawPart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class LawChapterController extends Controller
{

    public function getPart($id){
        $data = LawPart::where('law_id',$id)->where('status',1)->get();
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
        // dd($request->all());
        $request->validate([
            'chapter_no' => 'required_without:chapter_no_bn',
            'chapter_no_bn' => 'required_without:chapter_no',
            'title' => 'required_without:title_bn',
            'title_bn' => 'required_without:title',
            'sort' => 'nullable|numeric|min:0',
        ]);

        $data = new LawChapter();

        $data->law_id        = $request->law_id;
        $data->chapter_no    = $request->chapter_no;
        $data->law_part_id   = $request->law_part_id;
        $data->chapter_no_bn = $request->chapter_no_bn;
        $data->title         = $request->title;
        $data->title_bn      = $request->title_bn;
        $data->slug          = '';
        $data->sort          = $request->sort;
        $data->status        = $request->status;
        $data->is_act        = $request->is_act;
        $data->is_rules      = $request->is_rules;
        $data->created_by    = Auth::user()->id;
        $data->save();

        $genSlug = LawChapter::find($data->id);
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
        $data = LawChapter::find($id);
        $part = LawPart::where('law_id',$data->law_id)->where('status',1)->get();
        return response()->json([
            'chapter' => $data,
            'part' => $part
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
            'chapter_no' => 'required_without:chapter_no_bn',
            'chapter_no_bn' => 'required_without:chapter_no',
            'title' => 'required_without:title_bn',
            'title_bn' => 'required_without:title',
            'sort' => 'nullable|numeric|min:0',
        ]);

        $data = LawChapter::find($id);
        $data->chapter_no    = $request->chapter_no;
        $data->law_part_id   = $request->law_part_id;
        $data->chapter_no_bn = $request->chapter_no_bn;
        $data->title         = $request->title;
        $data->title_bn      = $request->title_bn;
        $data->slug          = Str::slug($request->title) . $data->id;
        $data->sort          = $request->sort;
        $data->status        = $request->status;
        $data->updated_by    = Auth::user()->id;
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
        $data = LawChapter::find($id);
        $data->deleted_by = Auth::user()->id;
        $data->save();
        $true = $data->delete();
        return response()->json($true);
    }
}
