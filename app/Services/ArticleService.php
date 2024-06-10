<?php

namespace App\Services;

use App\Models\Article;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ArticleService
{
    public function getAllArticles()
    {
        return Article::with(['category','createdBy','updatedBy', 'wroteBy'])->latest()->get();
    }

    public function createArticle($input)
    {
        $input['slug'] = Str::slug($input['title']);
        $input['user_id'] = $input['user_id'] ?? Auth::user()->id;
        $input['created_by'] = Auth::user()->id;
        if(isset($input['thumbnail_image'])){
            $input['thumbnail_image'] = uploadFile($input['thumbnail_image'], 'article');
        }

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
        $input['user_id'] = $input['user_id'] ?? Auth::user()->id;
        $input['updated_by'] = Auth::user()->id;

        if (isset($input['thumbnail_image'])) {
            if($article->thumbnail_image){
                deleteFile($article->thumbnail_image);
            }
            $input['thumbnail_image'] = uploadFile($input['thumbnail_image'], 'article');
        }

        $article->update($input);

        return $article;
    }

    public function deleteArticle($id)
    {
        $article = Article::find($id);
        $article->deleted_by = Auth::user()->id;
        $article->save();
        $article->delete();
    }
}
