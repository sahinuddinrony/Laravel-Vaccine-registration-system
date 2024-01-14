<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
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
            'vaccine_center_id' => 'required',
            'name' => 'required|string|max:50',
            'phone_number' => 'required|string|unique:user_vaccine_registrations,phone_number|max:18',
            'nid' => 'required|numeric|unique:user_vaccine_registrations,nid|digits:10',
            'email' => 'required|email|unique:user_vaccine_registrations,email',
        ];
    }
}
