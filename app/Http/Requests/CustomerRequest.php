<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
            'nik' => 'required|digits_between:10,20|unique:customers,nik',
            'email' => 'nullable|email',
            'birth_place' => 'nullable|string|max:255',
            'birth_date' => 'nullable|date',
            'gender' => 'nullable|in:male,female',
            'marital_status' => 'nullable|in:single,married,widow,widower',
            'phone' => 'nullable|string|max:20',
            'province' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'district' => 'nullable|string|max:255',
            'postal_code' => 'nullable|string|max:10',
            'address' => 'nullable|string',

            'name_father' => 'nullable|string|max:255',
            'name_mother' => 'nullable|string|max:255',
            'name_partner' => 'nullable|string|max:255',
            'children_count' => 'nullable|integer|min:0',

            'passport_number' => 'nullable|string|max:50',
            'passport_issuer_date' => 'nullable|date',
            'passport_expiry_date' => 'nullable|date|after_or_equal:passport_issuer_date',
            'passport_place_issued' => 'nullable|string|max:255',

            'pilgrimage_type_id' => 'nullable|exists:pilgrimage_types,id',
            'pilgrimage_batch_id' => 'nullable|exists:pilgrimage_batches,id',

            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'kk' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'ktp' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'passport' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'vaccine_certificate' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'payment_proof' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ];
    }
}
