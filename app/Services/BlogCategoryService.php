<?php

namespace App\Services;

use App\Models\BlogCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BlogCategoryService
{
    public function getAllCategories()
    {
        return BlogCategory::latest()->get();
    }

    public function createCategory($input)
    {
        $input['slug'] = Str::slug($input['name']);
        $input['created_by'] = Auth::user()->id;
        $input['image'] = uploadFile($input['image'], 'blog_category');

        return BlogCategory::create($input);
    }

    public function getCategory($id)
    {
        return BlogCategory::findOrFail($id);
    }

    public function updateCategory($id, $input)
    {
        $category = BlogCategory::findOrFail($id);
        $input['slug'] = Str::slug($input['name']);
        $input['updated_by'] = Auth::user()->id;

        if (isset($input['image'])) {
            deleteFile($category->image);
            $input['image'] = uploadFile($input['image'], 'blog_category');
        }

        $category->update($input);

        return $category;
    }

    public function deleteCategory($id)
    {
        $category = BlogCategory::findOrFail($id);
        $category->deleted_by = Auth::user()->id;
        $category->save();
        $category->delete();
    }
}
