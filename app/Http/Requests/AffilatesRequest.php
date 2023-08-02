<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AffilatesRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'affiliate_first_name' => 'string|required',
            'affiliate_last_name' => 'string|required',
            'affiliate_email' => 'email|required',
            'affiliate_address' => 'string|required',
            'preferred_payment_method' => 'nullable',
            'sender_name' => 'nullable',
            'phone_number' => 'nullable',
            'user_id' => 'required',
            'image' => 'required',
        ];
    }
}
