<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsCategoryRequest extends FormRequest
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
        $id = $this->route('news_category');
        $imageRules = $id !== null ? 'sometimes|nullable|mimes:jpg,jpeg,png,webp,svg|max:2048' : 'required|mimes:jpg,jpeg,png,webp,svg|max:2048';
        return [
            'name' => 'required|unique:news_categories,name,' . $id,
            'image' => $imageRules,
            'sort' => 'numeric|min:0',
        ];
    }
}
