<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\WriteUpCategoryRequest;
use App\Models\BaseModel;
use App\Services\WriteUpCategoryService;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class WriteUpCategoryController extends Controller
{
    protected $writeUpCategoryService;

    public function __construct(WriteUpCategoryService $writeUpCategoryService)
    {
        $this->writeUpCategoryService = $writeUpCategoryService;
    }

    public function index()
    {
        if (request()->ajax()) {
            $categories = $this->writeUpCategoryService->getAllCategories();
            return DataTables::of($categories)
                ->editColumn('image', function ($category) {
                    $imageUrl = $category->image ? asset($category->image) : asset('defaults/noimage/no_img.jpg');
                    return '<img class="rounded" width="60" src="' . $imageUrl . '" alt="' . $category->name . '">';
                })
                ->editColumn('is_active', function ($write_up_category) {
                    $checkStatus = $write_up_category->is_active ? 'checked' : '';
                    return '<div class="form-check form-switch">
                                <input class="form-check-input change-status-checkbox" type="checkbox" role="switch" data-id="' . $write_up_category->id . '" ' . $checkStatus . '>
                             </div>';
                })
                ->addColumn('action', function ($category) {
                    $str = '<a href="' . route("write_up.categories.edit", $category->id) . '" class="me-1"><i class="far fa-edit text-dark"></i></a>';
                    $str .= '<form class="d-inline" id="delForm" action="' . route("write_up.categories.destroy", $category->id) . '" method="POST">' .
                        csrf_field() .
                        method_field("DELETE") .
                        '<button id="delete" type="submit" class="me-1 dlt-btn"><i class="far fa-trash-alt text-danger"></i></button>' .
                        '</form>';
                    return $str;
                })
                ->rawColumns(['action', 'image', 'is_active'])
                ->make(true);
        }

        return view('admin.write_up_categories.index');
    }

    public function create()
    {
        return view('admin.write_up_categories.create');
    }

    public function store(WriteUpCategoryRequest $request)
    {
        $this->writeUpCategoryService->createCategory($request->validated());
        return redirect()->route('write_up.categories.index')->with([
            'message' => 'Data stored successfully.',
            'alert-type' => 'success'
        ]);
    }

    public function edit($id)
    {
        $category = $this->writeUpCategoryService->getCategory($id);
        return view('admin.blog_categories.edit', compact('category'));
    }

    public function update(WriteUpCategoryRequest $request, $id)
    {
        $this->writeUpCategoryService->updateCategory($id, $request->validated());
        return redirect()->route('write_up.categories.index')->with([
            'message' => 'Data updated successfully.',
            'alert-type' => 'success'
        ]);
    }

    public function destroy($id)
    {
        $this->writeUpCategoryService->deleteCategory($id);
        return redirect()->back()->with([
            'message' => 'Data deleted successfully.',
            'alert-type' => 'success'
        ]);
    }
}
