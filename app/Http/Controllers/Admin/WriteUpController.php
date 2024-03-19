<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\WriteUpRequest;
use App\Models\WriteUpCategory;
use App\Services\WriteUpCategoryService;
use App\Services\WriteUpService;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class WriteUpController extends Controller
{
    protected $writeUpService;
    protected $writeUpCategoryService;

    public function __construct(WriteUpService $writeUpService, WriteUpCategoryService $writeUpCategoryService)
    {
        $this->writeUpService = $writeUpService;
        $this->writeUpCategoryService = $writeUpCategoryService;
    }

    public function index()
    {
        if (request()->ajax()) {
            $writeUps = $this->writeUpService->getAllWriteUps();
            return DataTables::of($writeUps)
                ->editColumn('thumbnail_image', function ($writeUp) {
                    $imageUrl = $writeUp->thumbnail_image ? Storage::url($writeUp->thumbnail_image) : asset('defaults/noimage/no_img.jpg');
                    return '<img class="rounded" width="60" src="' . $imageUrl . '" alt="' . $writeUp->title . '">';
                })
                ->editColumn('is_active', function ($writeUp) {
                    $checkStatus = $writeUp->is_active ? 'checked' : '';
                    return '<div class="form-check form-switch">
                                <input class="form-check-input change-status-checkbox" type="checkbox" role="switch" data-id="' . $writeUp->id . '" ' . $checkStatus . '>
                             </div>';
                })
                ->addColumn('action', function ($writeUp) {
                    $str = '<a href="' . route("write_ups.edit", $writeUp->id) . '" class="me-1"><i class="far fa-edit text-dark"></i></a>';
                    $str .= '<form class="d-inline" id="delForm" action="' . route("write_ups.destroy", $writeUp->id) . '" method="POST">' .
                        csrf_field() .
                        method_field("DELETE") .
                        '<button id="delete" type="submit" class="me-1 dlt-btn"><i class="far fa-trash-alt text-danger"></i></button>' .
                        '</form>';
                    return $str;
                })
                ->rawColumns(['action', 'thumbnail_image', 'is_active'])
                ->make(true);
        }
        return view('admin.write_ups.index');
    }

    public function create()
    {
        $categories = $this->writeUpCategoryService->getAllCategories();
        return view('admin.write_ups.create', compact('categories'));
    }

    public function store(WriteUpRequest $request)
    {
        $this->writeUpService->createWriteUp($request->validated());
        return redirect()->route('write_ups.index')->with([
            'message' => 'Data stored successfully.',
            'alert-type' => 'success'
        ]);
    }

    public function edit($id)
    {
        $write_up = $this->writeUpService->getWriteUp($id);
        $categories = $this->writeUpCategoryService->getAllCategories();
        return view('admin.write_ups.edit', compact('write_up', 'categories'));
    }

    public function update(WriteUpRequest $request, $id)
    {
        $this->writeUpService->updateWriteUp($id, $request->validated());
        return redirect()->route('write_ups.index')->with([
            'message' => 'Data updated successfully.',
            'alert-type' => 'success'
        ]);
    }

    public function destroy($id)
    {
        $this->writeUpService->deleteWriteUp($id);
        return redirect()->back()->with([
            'message' => 'Data deleted successfully.',
            'alert-type' => 'success'
        ]);
    }
}
