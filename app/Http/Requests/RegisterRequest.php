<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'phone_no' => 'prohibited_unless:email,null|required_without:email|regex:/(0)[0-9]{9}/|unique:users',
            'email' => 'prohibited_unless:phone_no,null|required_without:phone_no|email|unique:users',
            'name' => 'required|min:3',
            'password' => 'required|min:8'
        ];
    }
}
