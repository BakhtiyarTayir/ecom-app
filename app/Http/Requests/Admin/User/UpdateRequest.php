<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'name' => 'required|string',
            'email' => 'required|string|email',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Это поля неоходимо заполнить',
            'name.string' => 'Это поля должно быть строкой',
            'email.required' => 'Это поля неоходимо заполнить',
            'email.string' => 'Это поля должно быть строкой',
            'email.email' => 'Ваша почта должна соответсовать формату email@some.domain',
        ];
    }
}