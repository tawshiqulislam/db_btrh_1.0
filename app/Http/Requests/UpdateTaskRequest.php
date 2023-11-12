<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTaskRequest extends FormRequest
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
            'assigned_to' => 'required',
            'project_initiation_id' => 'required',
            'task' => 'required',
            'document' => 'nullable|file',
            'deadline' => 'nullable|date',
            'status' => 'nullable|string',
        ];
    }
    public function messages()
    {
        return [
            'assigned_to.required' => 'The assigned to field is required.',
            'project_initiation_id.required' => 'The project initiation field is required.',
            'task.required' => 'The task field is required.',
            'document.file' => 'The document must be a file.',
            'deadline.date' => 'The deadline must be a valid date.',
            'status.string' => 'The status must be a string.',
        ];
    }
}
