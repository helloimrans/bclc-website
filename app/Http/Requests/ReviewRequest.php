<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $id = $this->route('review');
        $imageRules = $id !== null ? 'sometimes|nullable|mimes:jpg,jpeg,png,webp,svg,gif|max:2048' : 'required|mimes:jpg,jpeg,png,webp,svg,gif|max:2048';
        return [
            'title' => 'required|unique:reviews,title,' . $id,
            'thumbnail_image' => $imageRules,
            'review_category_id' => 'required',
            'description' => 'required',
        ];
    }
}