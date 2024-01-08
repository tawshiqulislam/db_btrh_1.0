<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VendorStoreRequest extends FormRequest
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
            'company_name' => 'required|string',
            'company_address' => 'required|string',
            'company_email_address' => 'required|email',
            'company_key_contact_person_name' => 'required|string',
            'designation_of_key_contact_person' => 'required|string',
            'key_contact_person_email_address' => 'required|email',
            'trade_license_no' => 'nullable|string',
            'vat_bin_no' => 'nullable|string',
            'tin_no' => 'nullable|string',
            'documents' => 'nullable|file|max:2048', // Adjust file types and size limit as needed
        ];
    }
    public function messages()
    {
        return [
            'company_name.required' => 'The company name is required.',
            'company_name.string' => 'The company name must be a string.',
            'company_address.required' => 'The company address is required.',
            'company_address.string' => 'The company address must be a string.',
            'company_email_address.required' => 'The company email address is required.',
            'company_email_address.email' => 'The company email address must be a valid email address.',
            'company_key_contact_person_name.required' => 'The key contact person name is required.',
            'company_key_contact_person_name.string' => 'The key contact person name must be a string.',
            'designation_of_key_contact_person.required' => 'The designation of key contact person is required.',
            'designation_of_key_contact_person.string' => 'The designation of key contact person must be a string.',
            'key_contact_person_email_address.required' => 'The key contact person email address is required.',
            'key_contact_person_email_address.email' => 'The key contact person email address must be a valid email address.',
            'trade_license_no.string' => 'The trade license number must be a string.',
            'vat_bin_no.string' => 'The VAT BIN number must be a string.',
            'tin_no.string' => 'The TIN number must be a string.',
            'documents.file' => 'The documents must be a file.',
            'documents.mimes' => 'The documents must be a file of type: :values.',

        ];
    }
}
