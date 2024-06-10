<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LawPart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class LawPartController extends Controller
{
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
            'part_no' => 'required_without:part_no_bn',
            'part_no_bn' => 'required_without:part_no',
            'title' => 'required_without:title_bn',
            'title_bn' => 'required_without:title',
            'sort' => 'nullable|numeric|min:0',
        ]);

        $data = new LawPart();

        $data->law_id        = $request->law_id;
        $data->part_no    = $request->part_no;
        $data->part_no_bn = $request->part_no_bn;
        $data->title         = $request->title;
        $data->title_bn      = $request->title_bn;
        $data->slug          = '';
        $data->sort          = $request->sort;
        $data->status        = $request->status;
        $data->is_act        = $request->is_act;
        $data->is_rules      = $request->is_rules;
        $data->created_by    = Auth::user()->id;
        $data->save();

        $genSlug = LawPart::find($data->id);
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
        $data = LawPart::find($id);
        return response()->json($data);
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
            'part_no' => 'required_without:part_no_bn',
            'part_no_bn' => 'required_without:part_no',
            'title' => 'required_without:title_bn',
            'title_bn' => 'required_without:title',
            'sort' => 'nullable|numeric|min:0',
        ]);

        $data = LawPart::find($id);
        $data->part_no       = $request->part_no;
        $data->part_no_bn    = $request->part_no_bn;
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
        $data = LawPart::find($id);
        $data->deleted_by = Auth::user()->id;
        $data->save();
        $true = $data->delete();
        return response()->json($true);
    }
}
