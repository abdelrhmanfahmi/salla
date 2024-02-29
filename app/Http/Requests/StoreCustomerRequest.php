<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCustomerRequest extends FormRequest
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
            'first_name' => 'required|min:2|max:100|string',
            'last_name' => 'required|min:2|max:100|string',
            'gender' => 'required|in:male,female',
            'mobile' => 'required|numeric',
            'email' => 'required|min:3|max:100|email'
        ];
    }
}
