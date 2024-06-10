<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogCategoryRequest extends FormRequest
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
        $id = $this->route('blog_category');
        return [
            'name' => 'required|unique:blog_categories,name,' . $id,
            'image' => 'nullable|mimes:jpg,jpeg,png,webp,svg|max:2048',
            'sort' => 'nullable|numeric|min:0',
        ];
    }
}
