<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UserFormRequest extends FormRequest
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
        $rules = [
            'name' => ['required', 'string', 'max:200'], 
            'email' => ['required', 'email'], 
            'password' => ['nullable', 'string', 'min:8'], 
            'role' => ['nullable', 'string'], 
            'city' => ['nullable', 'string'], 


        ];

        return $rules;
    }
}
