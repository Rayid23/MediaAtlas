<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
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
            'name' => 'required|unique:categories,name|max:16|min:3',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Имя категории обязательно.',
            'name.unique'   => 'Такая категория уже существует.',
            'name.max'      => 'Имя категории не должно превышать 16 символов.',
            'name.min'      => 'Имя категории должно быть не короче 3 символов.',
        ];
    }
}
