<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreCervezaColor extends FormRequest
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
            'nombre' => [
                'required',
                'min:3',
                Rule::unique('cervezas_colores')->ignore($this->cervezas_color),
            ],
        ];
    }

    public function atributes()
    {
        return [
            'nombre' => 'nombre del color',
        ];
    }

    public function messages()
    {
        // Para personalizar los mensajes de error de validación
        return [

            'nombre.required' => 'Debe ingresar un nombre al color',

        ];
    }
}
