<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleCategoryRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $id = $this->route('article_category');
        $imageRules = $id !== null ? 'sometimes|nullable|mimes:jpg,jpeg,png,webp,svg|max:2048' : 'required|mimes:jpg,jpeg,png,webp,svg|max:2048';
        return [
            'name' => 'required|unique:article_categories,name,' . $id,
            'image' => $imageRules,
            'sort' => 'numeric|min:0',
        ];
    }
}
