<?php

namespace App\Services;

use App\Models\DocumentSubCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class DocumentSubCategoryService
{
    public function getAllCategories()
    {
        return DocumentSubCategory::with('category')->latest()->get();
    }

    public function getByCategory($category_id)
    {
        return DocumentSubCategory::where('document_category_id', $category_id)->latest()->get();
    }

    public function createCategory($input)
    {
        $input['slug'] = Str::slug($input['name']);
        $input['created_by'] = Auth::user()->id;
        return DocumentSubCategory::create($input);
    }

    public function getCategory($id)
    {
        return DocumentSubCategory::findOrFail($id);
    }

    public function updateCategory($id, $input)
    {
        $category = DocumentSubCategory::findOrFail($id);
        $input['slug'] = Str::slug($input['name']);
        $input['updated_by'] = Auth::user()->id;
        $category->update($input);
        return $category;
    }

    public function deleteCategory($id)
    {
        $category = DocumentSubCategory::findOrFail($id);
        $category->deleted_by = Auth::user()->id;
        $category->save();
        $category->delete();
    }
}
