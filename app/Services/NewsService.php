<?php

namespace App\Services;

use App\Models\News;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class NewsService
{
    public function getAllNews()
    {
        return News::with(['category','createdBy','updatedBy','wroteBy'])->latest()->get();
    }

    public function createNews($input)
    {
        $input['slug'] = Str::slug($input['title']);
        $input['user_id'] = $input['user_id'] ?? Auth::user()->id;
        $input['created_by'] = Auth::user()->id;
        $input['thumbnail_image'] = uploadFile($input['thumbnail_image'], 'news');

        return News::create($input);
    }

    public function getNews($id)
    {
        return News::findOrFail($id);
    }

    public function updateNews($id, $input)
    {
        $news = News::find($id);
        $input['slug'] = Str::slug($input['title']);
        $input['user_id'] = $input['user_id'] ?? Auth::user()->id;
        $input['updated_by'] = Auth::user()->id;

        if (isset($input['thumbnail_image'])) {
            deleteFile($news->thumbnail_image);
            $input['thumbnail_image'] = uploadFile($input['thumbnail_image'], 'news');
        }

        $news->update($input);

        return $news;
    }

    public function deleteNews($id)
    {
        $news = News::find($id);
        $news->deleted_by = Auth::user()->id;
        $news->save();
        $news->delete();
    }
}
