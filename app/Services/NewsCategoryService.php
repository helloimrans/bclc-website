<?php

namespace App\Services;

use App\Models\NewsCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class NewsCategoryService
{
    public function getAllCategories()
    {
        return NewsCategory::latest()->get();
    }

    public function createCategory($input)
    {
        $input['slug'] = Str::slug($input['name']);
        $input['created_by'] = Auth::user()->id;
        if(isset($input['image'])){
            $input['image'] = uploadFile($input['image'], 'news_category');
        }

        return NewsCategory::create($input);
    }

    public function getCategory($id)
    {
        return NewsCategory::findOrFail($id);
    }

    public function updateCategory($id, $input)
    {
        $category = NewsCategory::findOrFail($id);
        $input['slug'] = Str::slug($input['name']);
        $input['updated_by'] = Auth::user()->id;

        if (isset($input['image'])) {
            if($category->image){
                deleteFile($category->image);
            }
            $input['image'] = uploadFile($input['image'], 'news_category');
        }

        $category->update($input);

        return $category;
    }

    public function deleteCategory($id)
    {
        $category = NewsCategory::findOrFail($id);
        $category->deleted_by = Auth::user()->id;
        $category->save();
        $category->delete();
    }
}
