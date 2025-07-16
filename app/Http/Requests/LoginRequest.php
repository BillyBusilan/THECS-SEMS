<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use function Laravel\Prompts\password;

class LoginRequest extends FormRequest
{
    public function autorize()
    {
        return true;
    }

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'idNumber' => 'required|string|max:20',
            'password' => 'required|string|min:6',
        ];
    }

    public function messages()
    {
        return [
            'idNumber.required' => 'ID Number is required.',
            'idNumber.string' => 'ID Number must be a string.',
            'idNumber.max' => 'ID Number cannot exceed 20 characters.',
            'password.required' => 'Password is required.',
            'password.min' => 'Password must be at least 6 characters.',
        ];
    }
}
