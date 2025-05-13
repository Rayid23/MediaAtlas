<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
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
            'name' => [
                'required',
                'string',
                'min:3',
                'max:16',
                'unique:categories,name',
            ],
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Поле "Имя" обязательно для заполнения.',
            'name.string'   => 'Поле "Имя" должно быть строкой.',
            'name.min'      => 'Имя должно содержать не менее 3 символов.',
            'name.max'      => 'Имя не должно превышать 32 символа.',
            'name.unique'   => 'Категория с таким именем уже существует.',
        ];
    }
}
