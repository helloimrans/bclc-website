<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewCategoryRequest extends FormRequest
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
        $id = $this->route('review_category');
        $imageRules = $id !== null ? 'sometimes|nullable|mimes:jpg,jpeg,png,webp,svg|max:2048' : 'required|mimes:jpg,jpeg,png,webp,svg|max:2048';
        return [
            'name' => 'required|unique:review_categories,name,' . $id,
            'image' => $imageRules,
            'sort' => 'numeric|min:0',
        ];
    }
}
