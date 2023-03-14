<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePuntaje extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'star' => 'required',
        ];
    }

    public function atributes()
    {
        return [
            'star' => 'puntaje',
        ];
    }

    public function messages()
    {
        return [
            'star.required' => 'El puntaje no puede estar vacío',
        ];
    }
}
