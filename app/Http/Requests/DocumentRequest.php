<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DocumentRequest extends FormRequest
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
        $id = $this->route('documents');
        $fileRules = $id !== null ? 'sometimes|nullable|mimes:pdf|max:2048' : 'required|mimes:pdf|max:2048';
        return [
            'title' => 'nullable|string',
            'file' => $fileRules,
            'document_category_id' => 'required|integer',
            'document_sub_category_id' => 'nullable|integer',
            'description' => 'nullable',
        ];
    }
}
