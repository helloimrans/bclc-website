<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
        $id = $this->route('user');
        $passwordRules = $id !== null ? 'sometimes|nullable|min:8' : 'required|min:8';
        return [
            'user_type' => 'required',
            'name' => 'required',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($id),
            ],
            'mobile' => 'required',
            'dob' => 'nullable|date',
            'gender' => 'nullable|in:Male,Female,Others',
            'marital_status' => 'nullable|in:Married,Unmarried',
            'address' => 'nullable|string',
            'is_lawyer' => 'nullable|boolean',
            'is_consultant' => 'nullable|boolean',
            'is_trainer' => 'nullable|boolean',
            'is_writer' => 'nullable|boolean',
            'photo' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
            'about' => 'nullable|string',
            'designation' => 'nullable|string|max:255',
            'workplace_name' => 'nullable|string|max:255',
            'password' => $passwordRules,
        ];
    }
}
