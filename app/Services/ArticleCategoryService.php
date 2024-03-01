<?php

namespace App\Services;

use App\Models\ArticleCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ArticleCategoryService
{
    public function getAllCategories()
    {
        return ArticleCategory::latest()->get();
    }

    public function createCategory($input)
    {
        $input['slug'] = Str::slug($input['name']);
        $input['created_by'] = Auth::guard('admin')->user()->id;
        $input['image'] = uploadFile($input['image'], 'uploaded/article_category');

        return ArticleCategory::create($input);
    }

    public function getCategory($id)
    {
        return ArticleCategory::findOrFail($id);
    }

    public function updateCategory($id, $input)
    {
        $category = ArticleCategory::findOrFail($id);
        $input['slug'] = Str::slug($input['name']);
        $input['updated_by'] = Auth::guard('admin')->user()->id;

        if (isset($input['image'])) {
            deleteFile($category->image);
            $input['image'] = uploadFile($input['image'], 'uploaded/article_category');
        }

        $category->update($input);

        return $category;
    }

    public function deleteCategory($id)
    {
        $category = ArticleCategory::findOrFail($id);
        $category->deleted_by = Auth::guard('admin')->user()->id;
        $category->save();
        deleteFile($category->image);
        $category->delete();
    }
}
