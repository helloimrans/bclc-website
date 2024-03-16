<?php

namespace App\Services;

use App\Models\Blog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BlogService
{
    public function getAllBlogs()
    {
        return Blog::with(['category','createdBy','updatedBy'])->latest()->get();
    }

    public function createBlog($input)
    {
        $input['slug'] = Str::slug($input['title']);
        $input['created_by'] = Auth::user()->id;
        if(isset($input['thumbnail_image'])){
            $input['thumbnail_image'] = uploadFile($input['thumbnail_image'], 'blog');
        }

        return Blog::create($input);
    }

    public function getBlog($id)
    {
        return Blog::findOrFail($id);
    }

    public function updateBlog($id, $input)
    {
        $blog = Blog::find($id);
        $input['slug'] = Str::slug($input['title']);
        $input['updated_by'] = Auth::user()->id;

        if (isset($input['thumbnail_image'])) {
            if($blog->thumbnail_image){
                deleteFile($blog->thumbnail_image);
            }
            $input['thumbnail_image'] = uploadFile($input['thumbnail_image'], 'blog');
        }

        $blog->update($input);

        return $blog;
    }

    public function deleteBlog($id)
    {
        $blog = Blog::find($id);
        $blog->deleted_by = Auth::user()->id;
        $blog->save();
        $blog->delete();
    }
}
