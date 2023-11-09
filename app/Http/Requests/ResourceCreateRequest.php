<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResourceCreateRequest extends FormRequest
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
            'name' => 'required',
            'resource_type' => 'required',
            'document' => 'max:5000',

        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'The resource name is required.',
            'resource_type.required' => 'The resource type is required.',
            'document.max' => 'The document file size must not exceed 5MB.',
        ];
    }
}
