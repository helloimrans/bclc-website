<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DocumentCategoryRequest;
use App\Services\DocumentCategoryService;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class DocumentCategoryController extends Controller
{
    protected $documentCategoryService;

    public function __construct(DocumentCategoryService $documentCategoryService)
    {
        $this->documentCategoryService = $documentCategoryService;
    }

    public function index()
    {
        if (request()->ajax()) {
            $categories = $this->documentCategoryService->getAllCategories();
            return DataTables::of($categories)
                ->editColumn('is_active', function ($category) {
                    $checkStatus = $category->is_active ? 'checked' : '';
                    return '<div class="form-check form-switch">
                                <input class="form-check-input change-status-checkbox" type="checkbox" role="switch" data-id="' . $category->id . '" ' . $checkStatus . '>
                             </div>';
                })
                ->addColumn('action', function ($category) {
                    $str = '<a href="' . route("document.categories.edit", $category->id) . '" class="me-1"><i class="far fa-edit text-dark"></i></a>';
                    $str .= '<form class="d-inline" id="delForm" action="' . route("document.categories.destroy", $category->id) . '" method="POST">' .
                        csrf_field() .
                        method_field("DELETE") .
                        '<button id="delete" type="submit" class="me-1 dlt-btn"><i class="far fa-trash-alt text-danger"></i></button>' .
                        '</form>';
                    return $str;
                })
                ->rawColumns(['action', 'is_active'])
                ->make(true);
        }

        return view('admin.document_categories.index');
    }

    public function create()
    {
        return view('admin.document_categories.create');
    }

    public function store(DocumentCategoryRequest $request)
    {
        $this->documentCategoryService->createCategory($request->validated());
        return redirect()->route('document.categories.index')->with([
            'message' => 'Data stored successfully.',
            'alert-type' => 'success'
        ]);
    }

    public function edit($id)
    {
        $category = $this->documentCategoryService->getCategory($id);
        return view('admin.document_categories.edit', compact('category'));
    }

    public function update(DocumentCategoryRequest $request, $id)
    {
        $this->documentCategoryService->updateCategory($id, $request->validated());
        return redirect()->route('document.categories.index')->with([
            'message' => 'Data updated successfully.',
            'alert-type' => 'success'
        ]);
    }

    public function destroy($id)
    {
        $this->documentCategoryService->deleteCategory($id);
        return redirect()->back()->with([
            'message' => 'Data deleted successfully.',
            'alert-type' => 'success'
        ]);
    }
}
