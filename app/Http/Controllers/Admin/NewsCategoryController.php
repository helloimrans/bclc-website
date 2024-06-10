<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsCategoryRequest;
use App\Models\BaseModel;
use App\Services\NewsCategoryService;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class NewsCategoryController extends Controller
{
    protected $newsCategoryService;

    public function __construct(NewsCategoryService $newsCategoryService)
    {
        $this->newsCategoryService = $newsCategoryService;
    }

    public function index()
    {
        if (request()->ajax()) {
            $categories = $this->newsCategoryService->getAllCategories();
            return DataTables::of($categories)
                ->editColumn('image', function ($category) {
                    $imageUrl = $category->image ? Storage::url($category->image) : asset('defaults/noimage/no_img.jpg');
                    return '<img class="rounded" width="60" src="' . $imageUrl . '" alt="' . $category->name . '">';
                })
                ->editColumn('is_active', function ($news) {
                    $checkStatus = $news->is_active ? 'checked' : '';
                    return '<div class="form-check form-switch">
                                <input class="form-check-input change-status-checkbox" type="checkbox" role="switch" data-id="' . $news->id . '" ' . $checkStatus . '>
                             </div>';
                })
                ->addColumn('action', function ($category) {
                    $str = '<a href="' . route("news.categories.edit", $category->id) . '" class="me-1"><i class="far fa-edit text-dark"></i></a>';
                    $str .= '<form class="d-inline" id="delForm" action="' . route("news.categories.destroy", $category->id) . '" method="POST">' .
                        csrf_field() .
                        method_field("DELETE") .
                        '<button id="delete" type="submit" class="me-1 dlt-btn"><i class="far fa-trash-alt text-danger"></i></button>' .
                        '</form>';
                    return $str;
                })
                ->rawColumns(['action', 'image', 'is_active'])
                ->make(true);
        }

        return view('admin.news_categories.index');
    }

    public function create()
    {
        return view('admin.news_categories.create');
    }

    public function store(NewsCategoryRequest $request)
    {
        $this->newsCategoryService->createCategory($request->validated());
        return redirect()->route('news.categories.index')->with([
            'message' => 'Data stored successfully.',
            'alert-type' => 'success'
        ]);
    }

    public function edit($id)
    {
        $category = $this->newsCategoryService->getCategory($id);
        return view('admin.news_categories.edit', compact('category'));
    }

    public function update(NewsCategoryRequest $request, $id)
    {
        $this->newsCategoryService->updateCategory($id, $request->validated());
        return redirect()->route('news.categories.index')->with([
            'message' => 'Data updated successfully.',
            'alert-type' => 'success'
        ]);
    }

    public function destroy($id)
    {
        $this->newsCategoryService->deleteCategory($id);
        return redirect()->back()->with([
            'message' => 'Data deleted successfully.',
            'alert-type' => 'success'
        ]);
    }
}
