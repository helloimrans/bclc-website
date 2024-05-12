<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DocumentSubCategoryRequest;
use App\Services\DocumentCategoryService;
use App\Services\DocumentService;
use App\Services\DocumentSubCategoryService;
use Yajra\DataTables\DataTables;

class DocumentController extends Controller
{
    protected $documentSubCategoryService;
    protected $documentCategoryService;
    protected $documentService;

    public function __construct(
        DocumentSubCategoryService $documentSubCategoryService,
        DocumentCategoryService $documentCategoryService,
        DocumentService $documentService
    ) {
        $this->documentSubCategoryService = $documentSubCategoryService;
        $this->documentCategoryService = $documentCategoryService;
        $this->documentService = $documentService;
    }

    public function index()
    {
        if (request()->ajax()) {
            $documents = $this->documentService->getAllDocuments();
            return DataTables::of($documents)
                ->editColumn('is_active', function ($document) {
                    $checkStatus = $document->is_active ? 'checked' : '';
                    return '<div class="form-check form-switch">
                                <input class="form-check-input change-status-checkbox" type="checkbox" role="switch" data-id="' . $document->id . '" ' . $checkStatus . '>
                             </div>';
                })
                ->addColumn('action', function ($document) {
                    $str = '<a href="' . route("document.edit", $document->id) . '" class="me-1"><i class="far fa-edit text-dark"></i></a>';
                    $str .= '<form class="d-inline" id="delForm" action="' . route("document.destroy", $document->id) . '" method="POST">' .
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
        return view('admin.document.create', compact('categories'));
    }

    public function store(DocumentSubCategoryRequest $request)
    {
        $this->documentSubCategoryService->createCategory($request->validated());
        return redirect()->route('document.index')->with([
            'message' => 'Data stored successfully.',
            'alert-type' => 'success'
        ]);
    }

    public function edit($id)
    {
        $categories = $this->documentCategoryService->getAllCategories();
        return view('admin.document.edit', compact('categories'));
    }

    public function update(DocumentSubCategoryRequest $request, $id)
    {
        $this->documentSubCategoryService->updateCategory($id, $request->validated());
        return redirect()->route('document.index')->with([
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
