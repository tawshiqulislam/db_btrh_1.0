<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserDetailStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'user_id' => 'required',
            'name' => 'required|string|max:255',
            'file' => 'required|file|max:5120',
        ];
    }
    public function messages()
    {
        return [
            'user_id.required' => 'The user ID is required.',
            'name.required' => 'The name is required.',
            'name.string' => 'The name must be a string.',
            'name.max' => 'The name may not be greater than 255 characters.',
            'file.required' => 'The required file is required.',
            'file.file' => 'The file must be a valid file.',
            'file.max' => 'The file may not be greater than 5120 kilobytes.',
        ];
    }
}
