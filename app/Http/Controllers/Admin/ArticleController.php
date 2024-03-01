<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Models\ArticleCategory;
use App\Services\ArticleCategoryService;
use App\Services\ArticleService;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    protected $articleService;
    protected $articleCategoryService;

    public function __construct(ArticleService $articleService, ArticleCategoryService $articleCategoryService)
    {
        $this->articleService = $articleService;
        $this->articleCategoryService = $articleCategoryService;
    }

    public function index()
    {
        $articles = $this->articleService->getAllArticles();
        return view('admin.articles.index', compact('articles'));
    }

    public function create()
    {
        $categories = $this->articleCategoryService->getAllCategories();
        return view('admin.articles.create', compact('categories'));
    }

    public function store(ArticleRequest $request)
    {
        $this->articleService->createArticle($request->validated());
        return redirect()->route('articles.index')->with('success', 'Article created successfully.');
    }

    public function edit($id)
    {
        $article = $this->articleService->getArticle($id);
        $categories = $this->articleCategoryService->getAllCategories();
        return view('admin.articles.edit', compact('article', 'categories'));
    }

    public function update(ArticleRequest $request, $id)
    {
        $this->articleService->updateArticle($id, $request->validated());
        return redirect()->route('articles.index')->with('success', 'Article updated successfully.');
    }
    public function destroy($id)
    {
        $this->articleService->deleteArticle($id);
        return redirect()->back()->with('success', 'Article deleted successfully.');
    }
}
