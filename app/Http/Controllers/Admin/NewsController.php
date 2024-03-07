<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsRequest;
use App\Models\NewsCategory;
use App\Services\NewsCategoryService;
use App\Services\NewsService;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class NewsController extends Controller
{
    protected $newsService;
    protected $newsCategoryService;

    public function __construct(NewsService $newsService, NewsCategoryService $newsCategoryService)
    {
        $this->newsService = $newsService;
        $this->newsCategoryService = $newsCategoryService;
    }

    public function index()
    {
        if (request()->ajax()) {
            $newss = $this->newsService->getAllNews();
            return DataTables::of($newss)
                ->editColumn('thumbnail_image', function ($news) {
                    $imageUrl = $news->thumbnail_image ? asset($news->thumbnail_image) : asset('defaults/noimage/no_img.jpg');
                    return '<img class="rounded" width="60" src="' . $imageUrl . '" alt="' . $news->title . '">';
                })
                ->editColumn('is_active', function ($news) {
                    $checkStatus = $news->is_active ? 'checked' : '';
                    return '<div class="form-check form-switch">
                                <input class="form-check-input change-status-checkbox" type="checkbox" role="switch" data-id="' . $news->id . '" ' . $checkStatus . '>
                             </div>';
                })
                ->addColumn('action', function ($news) {
                    $str = '<a href="' . route("news.edit", $news->id) . '" class="me-1"><i class="far fa-edit text-dark"></i></a>';
                    $str .= '<form class="d-inline" id="delForm" action="' . route("news.destroy", $news->id) . '" method="POST">' .
                        csrf_field() .
                        method_field("DELETE") .
                        '<button id="delete" type="submit" class="me-1 dlt-btn"><i class="far fa-trash-alt text-danger"></i></button>' .
                        '</form>';
                    return $str;
                })
                ->rawColumns(['action', 'thumbnail_image', 'is_active'])
                ->make(true);
        }
        return view('admin.news.index');
    }

    public function create()
    {
        $categories = $this->newsCategoryService->getAllCategories();
        return view('admin.news.create', compact('categories'));
    }

    public function store(NewsRequest $request)
    {
        $this->newsService->createNews($request->validated());
        return redirect()->route('news.index')->with([
            'message' => 'Data stored successfully.',
            'alert-type' => 'success'
        ]);
    }

    public function edit($id)
    {
        $news = $this->newsService->getNews($id);
        $categories = $this->newsCategoryService->getAllCategories();
        return view('admin.news.edit', compact('news', 'categories'));
    }

    public function update(newsRequest $request, $id)
    {
        $this->newsService->updateNews($id, $request->validated());
        return redirect()->route('news.index')->with([
            'message' => 'Data updated successfully.',
            'alert-type' => 'success'
        ]);
    }

    public function destroy($id)
    {
        $this->newsService->deleteNews($id);
        return redirect()->back()->with([
            'message' => 'Data deleted successfully.',
            'alert-type' => 'success'
        ]);
    }
}
