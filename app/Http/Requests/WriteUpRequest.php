<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WriteUpRequest extends FormRequest
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
        $id = $this->route('write_up');
        $imageRules = $id !== null ? 'sometimes|nullable|mimes:jpg,jpeg,png,webp,svg,gif|max:2048' : 'nullable|mimes:jpg,jpeg,png,webp,svg,gif|max:2048';
        return [
            'title' => 'required|unique:write_ups,title,' . $id,
            'thumbnail_image' => $imageRules,
            'write_up_category_id' => 'required',
            'description' => 'required',
            'user_id' => 'nullable',
            'last_update' => 'nullable',
        ];
    }
}
