<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectCategoryStoreRequest extends FormRequest
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
            'name' => 'required|unique:project_categories',
            'description' => 'nullable|unique:project_categories',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The project category name is required.',
            'name.unique' => 'The project category name is already in use.',
            'description.unique' => 'The description is already in use.',
        ];
    }
}
