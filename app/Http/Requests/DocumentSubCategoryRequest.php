<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DocumentSubCategoryRequest extends FormRequest
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
        $id = $this->route('document_subcategory');
        return [
            'name' => 'required|unique:document_sub_categories,name,' . $id,
            'document_category_id' => 'required|integer',
            'sort' => 'nullable|numeric|min:0',
        ];
    }
}
