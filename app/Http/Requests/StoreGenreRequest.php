<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGenreRequest extends FormRequest
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
            'name' => 'required|min:2|max:16|unique:genres,name'
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Пожалуйста, заполните данное поле',
            'name.min' => 'Минимальная длина — 2 символа', 
            'name.max' => 'Максимальная длина — 16 символов',
            'name.unique' => 'Данное имя уже записано',
        ];
    }
}
