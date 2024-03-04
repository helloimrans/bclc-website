<?php

namespace App\Services;

use App\Models\WriteUpCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class WriteUpCategoryService
{
    public function getAllCategories()
    {
        return WriteUpCategory::latest()->get();
    }

    public function createCategory($input)
    {
        $input['slug'] = Str::slug($input['name']);
        $input['created_by'] = Auth::user()->id;
        $input['image'] = uploadFile($input['image'], 'write_up_category');

        return WriteUpCategory::create($input);
    }

    public function getCategory($id)
    {
        return WriteUpCategory::findOrFail($id);
    }

    public function updateCategory($id, $input)
    {
        $category = WriteUpCategory::findOrFail($id);
        $input['slug'] = Str::slug($input['name']);
        $input['updated_by'] = Auth::user()->id;

        if (isset($input['image'])) {
            deleteFile($category->image);
            $input['image'] = uploadFile($input['image'], 'write_up_category');
        }

        $category->update($input);

        return $category;
    }

    public function deleteCategory($id)
    {
        $category = WriteUpCategory::findOrFail($id);
        $category->deleted_by = Auth::user()->id;
        $category->save();
        $category->delete();
    }
}
