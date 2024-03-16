<?php

namespace App\Services;

use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ReviewService
{
    public function getAllReviews()
    {
        return Review::with(['category','createdBy','updatedBy'])->latest()->get();
    }

    public function createReview($input)
    {
        $input['slug'] = Str::slug($input['title']);
        $input['created_by'] = Auth::user()->id;
        if(isset($input['thumbnail_image'])){
            $input['thumbnail_image'] = uploadFile($input['thumbnail_image'], 'review');
        }

        return Review::create($input);
    }

    public function getReview($id)
    {
        return Review::findOrFail($id);
    }

    public function updateReview($id, $input)
    {
        $review = Review::find($id);
        $input['slug'] = Str::slug($input['title']);
        $input['updated_by'] = Auth::user()->id;

        if (isset($input['thumbnail_image'])) {
            if($review->thumbnail_image){
                deleteFile($review->thumbnail_image);
            }
            $input['thumbnail_image'] = uploadFile($input['thumbnail_image'], 'review');
        }

        $review->update($input);

        return $review;
    }

    public function deleteReview($id)
    {
        $review = Review::find($id);
        $review->deleted_by = Auth::user()->id;
        $review->save();
        $review->delete();
    }
}
