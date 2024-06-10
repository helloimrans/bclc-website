<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProfessionController extends Controller
{
    public function index()
    {
        $data['professions'] = Profession::with('createdBy')->latest()->get();
        return view('admin.profession.index', $data);
    }
    public function create()
    {
        return view('admin.profession.create');
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:professions,name',
        ]);

        if ($validator->fails()) {
            $notification = array(
                'message' => 'Something went wront!, Please try again.',
                'alert-type' => 'error'
            );
            return redirect()->back()->withErrors($validator)->withInput()->with($notification);
        }
        $input = $request->all();
        $input['created_by'] = Auth::user()->id;
        Profession::create($input);
        $notification = array(
            'message' => 'Successfully profession created.',
            'alert-type' => 'success'
        );
        return redirect()->route('profession.index')->with($notification);
    }
    public function show($id)
    {
    }
    public function edit($id)
    {
        $data['profession'] = Profession::findOrFail($id);
        return view('admin.profession.edit', $data);
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:professions,name,' . $id,
        ]);

        if ($validator->fails()) {
            $notification = array(
                'message' => 'Something went wront!, Please try again.',
                'alert-type' => 'error'
            );
            return redirect()->back()->withErrors($validator)->withInput()->with($notification);
        }

        $input = $request->all();
        $data = Profession::find($id);
        $input['updated_by'] = Auth::user()->id;

        $data->update($input);
        $notification = array(
            'message' => 'Successfully profession updated.',
            'alert-type' => 'success'
        );
        return redirect()->route('profession.index')->with($notification);
    }
    public function destroy($id)
    {
        Profession::find($id)->delete();
        $notification = array(
            'message' => 'Successfully data deleted.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
