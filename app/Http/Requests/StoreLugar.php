<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreLugar extends FormRequest
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
                Rule::unique('lugares')->ignore($this->lugar),
            ],
            'direccion' => 'required',
            'localidad' => 'required',
            'imagen' => 'nullable|image|mimes:jpg,jpeg,png,webp',
        ];
    }

    public function atributes()
    {
        return [
            'nombre' => 'nombre del lugar',
            'direccion' => 'dirección del lugar',
            'localidad' => 'localidad en la que se encuentra',
        ];
    }

    public function messages()
    {
        // Para personalizar los mensajes de error de validación
        return [
            'nombre.required' => 'Debe ingresar un nombre al lugar',
            'direccion.required' => 'Debe ingresar una dirección',
            'localidad.required' => 'Debe elegir una localidad',
            'imagen.image' => 'Debe elegir un archivo de formato de imagen (jpg, png, webp)',
            'imagen.mimes' => 'Debe elegir un archivo con formato de imagen (jpg, png, webp)',
        ];
    }
}
