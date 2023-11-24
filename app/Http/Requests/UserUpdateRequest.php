<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserUpdateRequest extends FormRequest
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
        $id = $this->route('id'); // Assuming the route parameter is named 'id'.
        return [
            'name' => 'required',
            'username' => [
                'required',
                Rule::unique('users')->ignore($id),
            ],
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($id),
            ],
            'phone_no' => [
                'required',
                'max:20',
                Rule::unique('users')->ignore($id),
            ],
            'address' => 'required',
            'id_number' => [
                'required',
                Rule::unique('users')->ignore($id),
            ],
            'pro_pic' => 'nullable|image|max:2048',
            'date_of_birth' => 'nullable',
            'password' => 'nullable|min:8',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Please enter your name.',
            'username.required' => 'Please enter a username.',
            'username.unique' => 'The username is already taken.',
            'email.required' => 'Please enter your email address.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'The email address is already in use.',
            'phone_no.required' => 'Please enter your phone number.',
            'phone_no.max' => 'The phone number must not exceed 20 characters.',
            'phone_no.unique' => 'The phone number is already in use.',
            'address.required' => 'Please enter your address.',
            'id_number.required' => 'Please enter your ID number.',
            'id_number.unique' => 'The ID number is already in use.',
            'id_type.required' => 'Please select your ID type.',
            'pro_pic.image' => 'Please upload a valid image file.',
            'pro_pic.max' => 'The image size should not exceed 2048 KB.',
            'password.min' => 'The password must be at least 8 characters.',
            // 'document.file' => 'Please upload a valid document file.',
            // 'document.max' => 'The document size should not exceed 5120 KB.',
        ];
    }
}
