<?php

namespace App\Services;

use App\Models\DocumentCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class DocumentCategoryService
{
    public function getAllCategories()
    {
        return DocumentCategory::latest()->get();
    }

    public function createCategory($input)
    {
        $input['slug'] = Str::slug($input['name']);
        $input['created_by'] = Auth::user()->id;
        return DocumentCategory::create($input);
    }

    public function getCategory($id)
    {
        return DocumentCategory::findOrFail($id);
    }

    public function updateCategory($id, $input)
    {
        $category = DocumentCategory::findOrFail($id);
        $input['slug'] = Str::slug($input['name']);
        $input['updated_by'] = Auth::user()->id;
        $category->update($input);

        return $category;
    }

    public function deleteCategory($id)
    {
        $category = DocumentCategory::findOrFail($id);
        $category->deleted_by = Auth::user()->id;
        $category->save();
        $category->delete();
    }
}
