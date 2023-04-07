<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LawSchedule;
use Illuminate\Support\Facades\Auth;


class LawScheduleController extends Controller
{
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'title' => 'required',
            'file' => 'required|mimes:png,jpg,jpeg,csv,txt,xlx,xls,pdf|max:2048'
        ]);

        $data = new LawSchedule();

        $data->law_id        = $request->law_id;
        $data->title         = $request->title;
        $file = $request->file('file');
        if ($file) {
            $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploaded/law_schedule'), $fileName);
            $data->file = '/uploaded/law_schedule/' . $fileName;
        }
        $data->status        = $request->status;
        $data->created_by    = Auth::guard('admin')->user()->id;
        $data->save();

        return response()->json($data);
    }
    public function edit($id)
    {
        $data = LawSchedule::find($id);
        return response()->json($data);
    }
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'title' => 'required',
            'file' => 'required|mimes:png,jpg,jpeg,csv,txt,xlx,xls,pdf|max:2048'
        ]);

        $data = LawSchedule::findOrFail($id);

        $data->title         = $request->title;
        $file = $request->file('file');
        if ($file) {
            $file_path = public_path($data->file);
            @unlink($file_path);
            $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploaded/law_schedule'), $fileName);
            $data->file = '/uploaded/law_schedule/' . $fileName;
        }
        $data->status        = $request->status;
        $data->updated_by    = Auth::guard('admin')->user()->id;
        $data->save();

        return response()->json($data);
    }
    public function destroy($id)
    {
        $data = LawSchedule::findOrFail($id);
        $data->deleted_by = Auth::guard('admin')->user()->id;
        $data->save();
        $true = $data->delete();
        return response()->json($true);
    }
}
