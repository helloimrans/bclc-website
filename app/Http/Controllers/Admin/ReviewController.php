<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReviewRequest;
use App\Models\ReviewCategory;
use App\Services\ReviewCategoryService;
use App\Services\ReviewService;
use App\Services\UserService;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class ReviewController extends Controller
{
    protected $reviewService;
    protected $reviewCategoryService;
    protected $userService;

    public function __construct(ReviewService $reviewService, ReviewCategoryService $reviewCategoryService, UserService $userService)
    {
        $this->reviewService = $reviewService;
        $this->reviewCategoryService = $reviewCategoryService;
        $this->userService = $userService;
    }

    public function index()
    {
        if (request()->ajax()) {
            $query = $this->reviewService->getAllReviewsDatatable();

            if ($writer = request()->get('writer')) {
                $query->where('user_id', $writer);
            }

            if ($fromDate = request()->get('from_date')) {
                $query->whereDate('created_at', '>=', $fromDate);
            }

            if ($toDate = request()->get('to_date')) {
                $query->whereDate('created_at', '<=', $toDate);
            }

            $reviews = $query->get();

            return DataTables::of($reviews)
                ->editColumn('thumbnail_image', function ($review) {
                    $imageUrl = $review->thumbnail_image ? Storage::url($review->thumbnail_image) : asset('defaults/noimage/no_img.jpg');
                    return '<img class="rounded" width="60" src="' . $imageUrl . '" alt="' . $review->title . '">';
                })
                ->editColumn('created_at', function ($review) {
                    return Carbon::parse($review->created_at)->format('d-m-Y');
                })
                ->editColumn('is_active', function ($news) {
                    $checkStatus = $news->is_active ? 'checked' : '';
                    return '<div class="form-check form-switch">
                                <input class="form-check-input change-status-checkbox" type="checkbox" role="switch" data-table="reviews" data-column="is_active" data-id="' . $news->id . '" ' . $checkStatus . '>
                             </div>';
                })
                ->editColumn('is_home_slider', function ($news) {
                    $checkStatus = $news->is_home_slider ? 'checked' : '';
                    return '<div class="form-check form-switch">
                                <input class="form-check-input change-status-checkbox" type="checkbox" role="switch" data-table="reviews" data-column="is_home_slider" data-id="' . $news->id . '" ' . $checkStatus . '>
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
                ->rawColumns(['action', 'thumbnail_image', 'is_active','is_home_slider'])
                ->make(true);
        }
        return view('admin.reviews.index');
    }

    public function create()
    {
        $categories = $this->reviewCategoryService->getAllCategories();
        $users = $this->userService->getAllUsers();
        return view('admin.reviews.create', compact('categories', 'users'));
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
        $users = $this->userService->getAllUsers();
        return view('admin.reviews.edit', compact('review', 'categories', 'users'));
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
