<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreLugaresCategoria extends FormRequest
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
                Rule::unique('lugares_categorias')->ignore($this->lugares_categoria),
            ],
        ];
    }

    public function atributes()
    {
        return [
            'nombre' => 'nombre de la categoría',
        ];
    }

    public function messages()
    {
        // Para personalizar los mensajes de error de validación
        return [
            'nombre.required' => 'Debe ingresar un nombre a la categoría',
        ];
    }
}
