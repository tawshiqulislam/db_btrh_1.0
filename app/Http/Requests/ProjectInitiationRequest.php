<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectInitiationRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'description' => 'required',
            'goal' => 'required',
            // 'deadline' => 'required',
            'required_file' => 'nullable|file|max:5120',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'The name field is required.',
            'name.string' => 'The name must be a string.',
            'name.max' => 'The name may not be greater than 255 characters.',
            // 'name.unique' => 'The name is already taken.',
            'description.required' => 'The description field is required.',
            'goal.required' => 'The goal field is required.',
            // 'deadline.required' => 'The deadline field is required.',
            'required_file.file' => 'The required file must be a file.',
            'required_file.max' => 'The required file may not be greater than 5120 kilobytes.',
        ];
    }
}
