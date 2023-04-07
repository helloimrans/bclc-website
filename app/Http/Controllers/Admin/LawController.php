<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Law;
use App\Models\LawCategory;
use App\Models\LawFaq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class LawController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['laws'] = Law::latest()->get();
        return view('admin.law.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categories'] = LawCategory::where('status', 1)->get();
        return view('admin.law.create', $data);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->is_rules == null) {
            $validator = Validator::make($request->all(), [
                'title' => 'required|unique:laws,title',
                'law_category_id' => 'required',
                'act_no' => 'required',
                'act_year' => 'required',
                'act_date' => 'required',
                'sort' => 'numeric|min:0',
                'short_form' => 'required',

            ]);
            if ($validator->fails()) {
                $notification = array(
                    'message' => 'Something went wront!, Please try again.',
                    'alert-type' => 'error'
                );
                return redirect()->back()->withErrors($validator)->withInput()->with($notification);
            }
        } else {
            $validator = Validator::make($request->all(), [
                'title' => 'required|unique:laws,title',
                'law_category_id' => 'required',
                'act_no' => 'required',
                'act_year' => 'required',
                'act_date' => 'required',
                'sort' => 'numeric|min:0',
                'short_form' => 'required',
                'rules_title' => 'required',
                'rules_short_form' => 'required',

            ]);
            if ($validator->fails()) {
                $notification = array(
                    'message' => 'Something went wront!, Please try again.',
                    'alert-type' => 'error'
                );
                return redirect()->back()->withErrors($validator)->withInput()->with($notification);
            }
        }


        $input = $request->all();

        $input['slug'] = Str::slug($request->title);
        $input['created_by'] = Auth::guard('admin')->user()->id;

        if ($request->is_rules == null) {
            $input['is_rules'] = 0;
        } else {
            $input['is_rules'] = $request->is_rules;
        }


        Law::create($input);

        $notification = array(
            'message' => 'Successfully  law created.',
            'alert-type' => 'success'
        );
        return redirect()->route('law.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['law'] = Law::with(['actChapter', 'rulesChapter'])->find($id);
        return view('admin.law.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['faqs'] = LawFaq::where('law_id', $id)->get();
        $data['categories'] = LawCategory::where('status', 1)->get();
        $data['law'] = Law::with(['actChapter', 'rulesChapter','actPart','rulesPart'])->find($id);

        if($data['law']->format == 'part_chapter_section'){
            return view('admin.law.edit_part_chapter_section', $data);
        }elseif($data['law']->format == 'part_section'){
            return view('admin.law.edit_part_section', $data);
        }elseif($data['law']->format == 'chapter_section'){
            return view('admin.law.edit_chapter_section', $data);
        }
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

        if ($request->is_rules == null) {
            $validator = Validator::make($request->all(), [
                'title' => 'required|unique:laws,title,' . $id,
                'law_category_id' => 'required',
                'act_no' => 'required',
                'act_year' => 'required',
                'act_date' => 'required',
                'sort' => 'numeric|min:0',
                'short_form' => 'required',

            ]);
            if ($validator->fails()) {
                $notification = array(
                    'message' => 'Something went wront!, Please try again.',
                    'alert-type' => 'error'
                );
                return redirect()->back()->withErrors($validator)->withInput()->with($notification);
            }
        } else {
            $validator = Validator::make($request->all(), [
                'title' => 'required|unique:laws,title,' . $id,
                'law_category_id' => 'required',
                'act_no' => 'required',
                'act_year' => 'required',
                'act_date' => 'required',
                'sort' => 'numeric|min:0',
                'short_form' => 'required',
                'rules_title' => 'required',
                'rules_short_form' => 'required',

            ]);
            if ($validator->fails()) {
                $notification = array(
                    'message' => 'Something went wront!, Please try again.',
                    'alert-type' => 'error'
                );
                return redirect()->back()->withErrors($validator)->withInput()->with($notification);
            }
        }


        $input = $request->all();
        $input['slug'] = Str::slug($request->title);
        $input['updated_by'] = Auth::guard('admin')->user()->id;

        if ($request->is_rules == null) {
            $input['is_rules'] = 0;
        } else {
            $input['is_rules'] = $request->is_rules;
        }


        $data = Law::find($id);
        $data->update($input);

        $notification = array(
            'message' => 'Successfully  law updated.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = LawCategory::find($id);
        $data->deleted_by = Auth::guard('admin')->user()->id;
        $data->save();
        $data->delete();
        $notification = array(
            'message' => 'Successfully deleted.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
