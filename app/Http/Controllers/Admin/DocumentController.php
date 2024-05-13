<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DocumentRequest;
use App\Http\Requests\DocumentSubCategoryRequest;
use App\Services\DocumentCategoryService;
use App\Services\DocumentService;
use App\Services\DocumentSubCategoryService;
use Illuminate\Support\Facades\Storage;
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
                ->editColumn('file', function ($document) {
                    return '<a href="' . Storage::url($document->file) . '" target="_blank" class="me-1"><i class="far fa-eye text-dark"></i> View File</a>';
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
                ->rawColumns(['action', 'is_active', 'file'])
                ->make(true);
        }

        return view('admin.document.index');
    }

    public function create()
    {
        $categories = $this->documentCategoryService->getAllCategories();
        return view('admin.document.create', compact('categories'));
    }

    public function store(DocumentRequest $request)
    {
        $this->documentService->createDocument($request->validated());
        return redirect()->route('document.index')->with([
            'message' => 'Data stored successfully.',
            'alert-type' => 'success'
        ]);
    }

    public function edit($id)
    {
        $document = $this->documentService->getDocument($id);
        $categories = $this->documentCategoryService->getAllCategories();
        return view('admin.document.edit', compact('categories', 'document'));
    }

    public function update(DocumentRequest $request, $id)
    {
        $this->documentService->updateDocument($id, $request->validated());
        return redirect()->route('document.index')->with([
            'message' => 'Data updated successfully.',
            'alert-type' => 'success'
        ]);
    }

    public function destroy($id)
    {
        $this->documentService->deleteDocument($id);
        return redirect()->back()->with([
            'message' => 'Data deleted successfully.',
            'alert-type' => 'success'
        ]);
    }
}
