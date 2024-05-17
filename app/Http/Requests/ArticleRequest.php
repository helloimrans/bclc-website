<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
        $id = $this->route('article');
        $imageRules = $id !== null ? 'sometimes|nullable|mimes:jpg,jpeg,png,webp,svg,gif|max:2048' : 'required|mimes:jpg,jpeg,png,webp,svg,gif|max:2048';
        return [
            'title' => 'required|unique:articles,title,' . $id,
            'thumbnail_image' => $imageRules,
            'article_category_id' => 'required',
            'description' => 'required',
            'user_id' => 'nullable',
        ];
    }
}
