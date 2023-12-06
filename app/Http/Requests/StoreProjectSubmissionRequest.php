<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectSubmissionRequest extends FormRequest
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
            'description' => 'required|string',
            'comment' => 'required|string',
            'link' => 'required',
            'status' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'description.required' => 'Description is required.',
            'description.string' => 'Description must be a string.',
            'comment.required' => 'Comment is required.',
            'comment.string' => 'Comment must be a string.',
            'link.required' => 'Link is required.',
            'status.required' => 'Status is required.',
        ];
    }
}
