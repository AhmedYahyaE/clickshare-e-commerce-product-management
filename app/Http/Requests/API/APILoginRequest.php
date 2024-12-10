<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

class APILoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Change the default false to true
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email'      => ['required', 'email', 'exists:users,email'],
            'password'   => ['required', 'string', 'min:6'],
            'token_name' => ['required', 'string'] // for Sanctum Authentication Token
        ];
    }
}
