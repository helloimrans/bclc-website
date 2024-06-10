<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DocumentSubCategoryRequest;
use App\Services\DocumentCategoryService;
use App\Services\DocumentSubCategoryService;
use Yajra\DataTables\DataTables;

class DocumentSubCategoryController extends Controller
{
    protected $documentSubCategoryService;
    protected $documentCategoryService;

    public function __construct(
        DocumentSubCategoryService $documentSubCategoryService,
        DocumentCategoryService $documentCategoryService
    ) {
        $this->documentSubCategoryService = $documentSubCategoryService;
        $this->documentCategoryService = $documentCategoryService;
    }

    public function getByCategory($category_id)
    {
        $subCategories = $this->documentSubCategoryService->getByCategory($category_id);
        if(request()->ajax()){
            return response()->json($subCategories);
        }
    }

    public function index()
    {
        if (request()->ajax()) {
            $categories = $this->documentSubCategoryService->getAllCategories();
            return DataTables::of($categories)
                ->editColumn('is_active', function ($category) {
                    $checkStatus = $category->is_active ? 'checked' : '';
                    return '<div class="form-check form-switch">
                                <input class="form-check-input change-status-checkbox" type="checkbox" role="switch" data-id="' . $category->id . '" ' . $checkStatus . '>
                             </div>';
                })
                ->addColumn('action', function ($category) {
                    $str = '<a href="' . route("document.subcategories.edit", $category->id) . '" class="me-1"><i class="far fa-edit text-dark"></i></a>';
                    $str .= '<form class="d-inline" id="delForm" action="' . route("document.subcategories.destroy", $category->id) . '" method="POST">' .
                        csrf_field() .
                        method_field("DELETE") .
                        '<button id="delete" type="submit" class="me-1 dlt-btn"><i class="far fa-trash-alt text-danger"></i></button>' .
                        '</form>';
                    return $str;
                })
                ->rawColumns(['action', 'is_active'])
                ->make(true);
        }

        return view('admin.document_subcategories.index');
    }

    public function create()
    {
        $categories = $this->documentCategoryService->getAllCategories();
        return view('admin.document_subcategories.create', compact('categories'));
    }

    public function store(DocumentSubCategoryRequest $request)
    {
        $this->documentSubCategoryService->createCategory($request->validated());
        return redirect()->route('document.subcategories.index')->with([
            'message' => 'Data stored successfully.',
            'alert-type' => 'success'
        ]);
    }

    public function edit($id)
    {
        $subCategory = $this->documentSubCategoryService->getCategory($id);
        $categories = $this->documentCategoryService->getAllCategories();
        return view('admin.document_subcategories.edit', compact('subCategory', 'categories'));
    }

    public function update(DocumentSubCategoryRequest $request, $id)
    {
        $this->documentSubCategoryService->updateCategory($id, $request->validated());
        return redirect()->route('document.subcategories.index')->with([
            'message' => 'Data updated successfully.',
            'alert-type' => 'success'
        ]);
    }

    public function destroy($id)
    {
        $this->documentSubCategoryService->deleteCategory($id);
        return redirect()->back()->with([
            'message' => 'Data deleted successfully.',
            'alert-type' => 'success'
        ]);
    }
}
