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
        return [
            'name' => 'required|unique:news_categories,name,' . $id,
            'image' => 'nullable|mimes:jpg,jpeg,png,webp,svg|max:2048',
            'sort' => 'nullable|numeric|min:0',
        ];
    }
}
