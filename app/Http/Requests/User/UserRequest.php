<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'fname' => 'required',
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email:filter',      
            'password' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'fname.required' => 'Hãy nhập họ và tên.',
            'name.required' => 'Hãy nhập username.',
            'phone.required' => 'Hãy nhập số điện thoại.',
            'email.required' => 'Hãy nhập email.',
            'password.required' => 'Hãy nhập mật khẩu.'
        ];
    }
}
