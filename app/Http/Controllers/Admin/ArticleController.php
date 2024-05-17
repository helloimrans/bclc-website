<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Models\ArticleCategory;
use App\Models\User;
use App\Services\ArticleCategoryService;
use App\Services\ArticleService;
use App\Services\UserService;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class ArticleController extends Controller
{
    protected $articleService;
    protected $articleCategoryService;
    protected $userService;

    public function __construct(
        ArticleService $articleService,
        ArticleCategoryService $articleCategoryService,
        UserService $userService
    ) {
        $this->articleService = $articleService;
        $this->articleCategoryService = $articleCategoryService;
        $this->userService = $userService;
    }

    public function index()
    {
        if (request()->ajax()) {
            $articles = $this->articleService->getAllArticles();
            return DataTables::of($articles)
                ->editColumn('thumbnail_image', function ($article) {
                    $imageUrl = $article->thumbnail_image ? Storage::url($article->thumbnail_image) : asset('defaults/noimage/no_img.jpg');
                    return '<img class="rounded" width="60" src="' . $imageUrl . '" alt="' . $article->title . '">';
                })
                ->editColumn('is_active', function ($article) {
                    $checkStatus = $article->is_active ? 'checked' : '';
                    return '<div class="form-check form-switch">
                                <input class="form-check-input change-status-checkbox" type="checkbox" role="switch" data-id="' . $article->id . '" ' . $checkStatus . '>
                             </div>';
                })
                ->addColumn('action', function ($article) {
                    $str = '<a href="' . route("articles.edit", $article->id) . '" class="me-1"><i class="far fa-edit text-dark"></i></a>';
                    $str .= '<form class="d-inline" id="delForm" action="' . route("articles.destroy", $article->id) . '" method="POST">' .
                        csrf_field() .
                        method_field("DELETE") .
                        '<button id="delete" type="submit" class="me-1 dlt-btn"><i class="far fa-trash-alt text-danger"></i></button>' .
                        '</form>';
                    return $str;
                })
                ->rawColumns(['action', 'thumbnail_image', 'is_active'])
                ->make(true);
        }
        return view('admin.articles.index');
    }

    public function create()
    {
        $categories = $this->articleCategoryService->getAllCategories();
        $users = $this->userService->getAllUsers();
        return view('admin.articles.create', compact('categories', 'users'));
    }

    public function store(ArticleRequest $request)
    {
        $this->articleService->createArticle($request->validated());
        return redirect()->route('articles.index')->with([
            'message' => 'Data stored successfully.',
            'alert-type' => 'success'
        ]);
    }

    public function edit($id)
    {
        $article = $this->articleService->getArticle($id);
        $categories = $this->articleCategoryService->getAllCategories();
        $users = $this->userService->getAllUsers();
        return view('admin.articles.edit', compact('article', 'categories', 'users'));
    }

    public function update(ArticleRequest $request, $id)
    {
        $this->articleService->updateArticle($id, $request->validated());
        return redirect()->route('articles.index')->with([
            'message' => 'Data updated successfully.',
            'alert-type' => 'success'
        ]);
    }

    public function destroy($id)
    {
        $this->articleService->deleteArticle($id);
        return redirect()->back()->with([
            'message' => 'Data deleted successfully.',
            'alert-type' => 'success'
        ]);
    }
}
