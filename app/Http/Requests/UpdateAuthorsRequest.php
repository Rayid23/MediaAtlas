<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAuthorsRequest extends FormRequest
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
            'name' => 'required|string|max:255|min:6',
            'url' => 'required|url',
            'bio' => 'max:500'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Пожалуйста, введите имя автора.',
            'name.string' => 'Имя должно быть строкой.',
            'name.max' => 'Имя не должно превышать 255 символов.',
            'name.min' => 'Имя должно содержать не менее 6 символов.',
            'url.required' => 'Пожалуйста, введите URL.',
            'url.url' => 'Пожалуйста, введите действительный URL.',
            'bio.max' => 'Биография не должна превышать 500 символов.',
        ];
    }
}
