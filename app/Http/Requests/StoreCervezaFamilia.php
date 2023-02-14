<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreCervezaFamilia extends FormRequest
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
                Rule::unique('cervezas_familias')->ignore($this->cervezas_familia),
            ],
            'fermento_id' => 'required',
        ];
    }

    public function atributes()
    {
        return [
            'nombre' => 'nombre de la familia',
            'fermento_id' => 'tipo de fermento',
        ];
    }

    public function messages()
    {
        // Para personalizar los mensajes de error de validación
        return [
            'nombre.required' => 'Debe ingresar un nombre a la familia de cerveza',
            'fermento_id.required' => 'Debe elegir un tipo de fermento',
        ];
    }
}
