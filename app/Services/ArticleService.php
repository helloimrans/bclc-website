<?php

namespace App\Services;

use App\Models\Article;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ArticleService
{
    public function getAllArticles()
    {
        return Article::with('category')->latest()->get();
    }

    public function createArticle($input)
    {
        $input['slug'] = Str::slug($input['title']);
        $input['created_by'] = Auth::guard('admin')->user()->id;
        $input['thumbnail_image'] = uploadFile($input['thumbnail_image'], 'uploaded/article');

        return Article::create($input);
    }

    public function getArticle($id)
    {
        return Article::findOrFail($id);
    }

    public function updateArticle($id, $input)
    {
        $article = Article::find($id);
        $input['slug'] = Str::slug($input['title']);
        $input['updated_by'] = Auth::guard('admin')->user()->id;

        if (isset($input['thumbnail_image'])) {
            deleteFile($article->thumbnail_image);
            $input['thumbnail_image'] = uploadFile($input['thumbnail_image'], 'uploaded/article');
        }

        $article->update($input);

        return $article;
    }

    public function deleteArticle($id)
    {
        $article = Article::find($id);
        $article->deleted_by = Auth::guard('admin')->user()->id;
        $article->save();
        deleteFile($article->thumbnail_image);
        $article->delete();
    }
}
