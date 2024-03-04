<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReviewCategoryRequest;
use App\Models\BaseModel;
use App\Services\ReviewCategoryService;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class ReviewCategoryController extends Controller
{
    protected $reviewCategoryService;

    public function __construct(ReviewCategoryService $reviewCategoryService)
    {
        $this->reviewCategoryService = $reviewCategoryService;
    }

    public function index()
    {
        if (request()->ajax()) {
            $categories = $this->reviewCategoryService->getAllCategories();
            return DataTables::of($categories)
                ->editColumn('image', function ($category) {
                    $imageUrl = $category->image ? Storage::url($category->image) : Storage::url('defaults/noimage/no_img.jpg');
                    return '<img class="rounded" width="60" src="' . $imageUrl . '" alt="' . $category->name . '">';
                })
                ->editColumn('is_active', function ($review) {
                    $checkStatus = $review->is_active ? 'checked' : '';
                    return '<div class="form-check form-switch">
                                <input class="form-check-input change-status-checkbox" type="checkbox" role="switch" data-id="' . $review->id . '" ' . $checkStatus . '>
                             </div>';
                })
                ->addColumn('action', function ($category) {
                    $str = '<a href="' . route("review.categories.edit", $category->id) . '" class="me-1"><i class="far fa-edit text-dark"></i></a>';
                    $str .= '<form class="d-inline" id="delForm" action="' . route("review.categories.destroy", $category->id) . '" method="POST">' .
                        csrf_field() .
                        method_field("DELETE") .
                        '<button id="delete" type="submit" class="me-1 dlt-btn"><i class="far fa-trash-alt text-danger"></i></button>' .
                        '</form>';
                    return $str;
                })
                ->rawColumns(['action', 'image', 'is_active'])
                ->make(true);
        }

        return view('admin.review_categories.index');
    }

    public function create()
    {
        return view('admin.review_categories.create');
    }

    public function store(ReviewCategoryRequest $request)
    {
        $this->reviewCategoryService->createCategory($request->validated());
        return redirect()->route('review.categories.index')->with([
            'message' => 'Data stored successfully.',
            'alert-type' => 'success'
        ]);
    }

    public function edit($id)
    {
        $category = $this->reviewCategoryService->getCategory($id);
        return view('admin.review_categories.edit', compact('category'));
    }

    public function update(ReviewCategoryRequest $request, $id)
    {
        $this->reviewCategoryService->updateCategory($id, $request->validated());
        return redirect()->route('review.categories.index')->with([
            'message' => 'Data updated successfully.',
            'alert-type' => 'success'
        ]);
    }

    public function destroy($id)
    {
        $this->reviewCategoryService->deleteCategory($id);
        return redirect()->back()->with([
            'message' => 'Data deleted successfully.',
            'alert-type' => 'success'
        ]);
    }
}
