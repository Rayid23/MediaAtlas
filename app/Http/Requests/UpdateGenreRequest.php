<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateGenreRequest extends FormRequest
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
            'name' => 'nullable|unique:genres,name|min:2|max:16'
        ];
    }
    public function messages(): array
    {
        return [
            'name.nullable' => 'Поля не должно оставаться пустым',
            'name.unique' => 'Данное название уже записано',
            'name.min' => 'Минимальная длина - 2 символ',
            'name.max' => 'Максимальная длина - 16 символов',
        ];
    }
}
