<?php

namespace App\Services;

use App\Models\ReviewCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ReviewCategoryService
{
    public function getAllCategories()
    {
        return ReviewCategory::latest()->get();
    }

    public function createCategory($input)
    {
        $input['slug'] = Str::slug($input['name']);
        $input['created_by'] = Auth::user()->id;
        $input['image'] = uploadFile($input['image'], 'review_category');

        return ReviewCategory::create($input);
    }

    public function getCategory($id)
    {
        return ReviewCategory::findOrFail($id);
    }

    public function updateCategory($id, $input)
    {
        $category = ReviewCategory::findOrFail($id);
        $input['slug'] = Str::slug($input['name']);
        $input['updated_by'] = Auth::user()->id;

        if (isset($input['image'])) {
            deleteFile($category->image);
            $input['image'] = uploadFile($input['image'], 'review_category');
        }

        $category->update($input);

        return $category;
    }

    public function deleteCategory($id)
    {
        $category = ReviewCategory::findOrFail($id);
        $category->deleted_by = Auth::user()->id;
        $category->save();
        $category->delete();
    }
}
