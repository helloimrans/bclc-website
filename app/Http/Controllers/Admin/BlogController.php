<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogRequest;
use App\Models\BlogCategory;
use App\Services\BlogCategoryService;
use App\Services\BlogService;
use App\Services\UserService;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class BlogController extends Controller
{
    protected $blogService;
    protected $blogCategoryService;
    protected $userService;

    public function __construct(BlogService $blogService, BlogCategoryService $blogCategoryService, UserService $userService)
    {
        $this->blogService = $blogService;
        $this->blogCategoryService = $blogCategoryService;
        $this->userService = $userService;
    }

    public function index()
    {
        if (request()->ajax()) {
            $query = $this->blogService->getAllBlogsDatatable();

            if ($writer = request()->get('writer')) {
                $query->where('user_id', $writer);
            }

            if ($fromDate = request()->get('from_date')) {
                $query->whereDate('created_at', '>=', $fromDate);
            }

            if ($toDate = request()->get('to_date')) {
                $query->whereDate('created_at', '<=', $toDate);
            }

            $blogs = $query->get();

            return DataTables::of($blogs)
                ->editColumn('thumbnail_image', function ($blog) {
                    $imageUrl = $blog->thumbnail_image ? Storage::url($blog->thumbnail_image) : asset('defaults/noimage/no_img.jpg');
                    return '<img class="rounded" width="60" src="' . $imageUrl . '" alt="' . $blog->title . '">';
                })
                ->editColumn('created_at', function ($blog) {
                    return Carbon::parse($blog->created_at)->format('d-m-Y');
                })
                ->editColumn('is_active', function ($blog) {
                    $checkStatus = $blog->is_active ? 'checked' : '';
                    return '<div class="form-check form-switch">
                                <input class="form-check-input change-status-checkbox" type="checkbox" role="switch" data-id="' . $blog->id . '" ' . $checkStatus . '>
                             </div>';
                })
                ->addColumn('action', function ($blog) {
                    $str = '<a href="' . route("blogs.edit", $blog->id) . '" class="me-1"><i class="far fa-edit text-dark"></i></a>';
                    $str .= '<form class="d-inline" id="delForm" action="' . route("blogs.destroy", $blog->id) . '" method="POST">' .
                        csrf_field() .
                        method_field("DELETE") .
                        '<button id="delete" type="submit" class="me-1 dlt-btn"><i class="far fa-trash-alt text-danger"></i></button>' .
                        '</form>';
                    return $str;
                })
                ->rawColumns(['action', 'thumbnail_image', 'is_active'])
                ->make(true);
        }
        return view('admin.blogs.index');
    }

    public function create()
    {
        $categories = $this->blogCategoryService->getAllCategories();
        $users = $this->userService->getAllUsers();
        return view('admin.blogs.create', compact('categories', 'users'));
    }

    public function store(BlogRequest $request)
    {
        $this->blogService->createBlog($request->validated());
        return redirect()->route('blogs.index')->with([
            'message' => 'Data stored successfully.',
            'alert-type' => 'success'
        ]);
    }

    public function edit($id)
    {
        $blog = $this->blogService->getBlog($id);
        $categories = $this->blogCategoryService->getAllCategories();
        $users = $this->userService->getAllUsers();
        return view('admin.blogs.edit', compact('blog', 'categories', 'users'));
    }

    public function update(BlogRequest $request, $id)
    {
        $this->blogService->updateBlog($id, $request->validated());
        return redirect()->route('blogs.index')->with([
            'message' => 'Data updated successfully.',
            'alert-type' => 'success'
        ]);
    }

    public function destroy($id)
    {
        $this->blogService->deleteBlog($id);
        return redirect()->back()->with([
            'message' => 'Data deleted successfully.',
            'alert-type' => 'success'
        ]);
    }
}
