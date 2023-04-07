<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LawFaq;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LawFaqController extends Controller
{
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $data = new LawFaq();

        $data->law_id     = $request->law_id;
        $data->title         = $request->title;
        $data->description   = $request->description;
        $data->status        = $request->status;
        $data->created_by    = Auth::guard('admin')->user()->id;
        $data->save();

        return response()->json($data);
    }
    public function edit($id)
    {
        $data = LawFaq::find($id);
        return response()->json($data);
    }
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $data = LawFaq::findOrFail($id);

        $data->title         = $request->title;
        $data->description   = $request->description;
        $data->status        = $request->status;
        $data->updated_by    = Auth::guard('admin')->user()->id;
        $data->save();

        return response()->json($data);
    }
    public function destroy($id)
    {
        $data = LawFaq::findOrFail($id);
        $data->deleted_by = Auth::guard('admin')->user()->id;
        $data->save();
        $true = $data->delete();
        return response()->json($true);
    }
}
