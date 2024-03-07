<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReviewRequest;
use App\Models\ReviewCategory;
use App\Services\ReviewCategoryService;
use App\Services\ReviewService;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class ReviewController extends Controller
{
    protected $reviewService;
    protected $reviewCategoryService;

    public function __construct(ReviewService $reviewService, ReviewCategoryService $reviewCategoryService)
    {
        $this->reviewService = $reviewService;
        $this->reviewCategoryService = $reviewCategoryService;
    }

    public function index()
    {
        if (request()->ajax()) {
            $reviews = $this->reviewService->getAllReviews();
            return DataTables::of($reviews)
                ->editColumn('thumbnail_image', function ($review) {
                    $imageUrl = $review->thumbnail_image ? asset($review->thumbnail_image) : asset('defaults/noimage/no_img.jpg');
                    return '<img class="rounded" width="60" src="' . $imageUrl . '" alt="' . $review->title . '">';
                })
                ->editColumn('is_active', function ($review) {
                    $checkStatus = $review->is_active ? 'checked' : '';
                    return '<div class="form-check form-switch">
                                <input class="form-check-input change-status-checkbox" type="checkbox" role="switch" data-id="' . $review->id . '" ' . $checkStatus . '>
                             </div>';
                })
                ->addColumn('action', function ($review) {
                    $str = '<a href="' . route("reviews.edit", $review->id) . '" class="me-1"><i class="far fa-edit text-dark"></i></a>';
                    $str .= '<form class="d-inline" id="delForm" action="' . route("reviews.destroy", $review->id) . '" method="POST">' .
                        csrf_field() .
                        method_field("DELETE") .
                        '<button id="delete" type="submit" class="me-1 dlt-btn"><i class="far fa-trash-alt text-danger"></i></button>' .
                        '</form>';
                    return $str;
                })
                ->rawColumns(['action', 'thumbnail_image', 'is_active'])
                ->make(true);
        }
        return view('admin.reviews.index');
    }

    public function create()
    {
        $categories = $this->reviewCategoryService->getAllCategories();
        return view('admin.reviews.create', compact('categories'));
    }

    public function store(ReviewRequest $request)
    {
        $this->reviewService->createReview($request->validated());
        return redirect()->route('reviews.index')->with([
            'message' => 'Data stored successfully.',
            'alert-type' => 'success'
        ]);
    }

    public function edit($id)
    {
        $review = $this->reviewService->getReview($id);
        $categories = $this->reviewCategoryService->getAllCategories();
        return view('admin.reviews.edit', compact('article', 'categories'));
    }

    public function update(ReviewRequest $request, $id)
    {
        $this->reviewService->updateReview($id, $request->validated());
        return redirect()->route('reviews.index')->with([
            'message' => 'Data updated successfully.',
            'alert-type' => 'success'
        ]);
    }

    public function destroy($id)
    {
        $this->reviewService->deleteReview($id);
        return redirect()->back()->with([
            'message' => 'Data deleted successfully.',
            'alert-type' => 'success'
        ]);
    }
}
