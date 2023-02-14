<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreProductor extends FormRequest
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
                Rule::unique('productores')->ignore($this->productor),
            ],
            'fabricacion_id' => 'required',
            'localidad' => 'required',
            'imagen' => 'nullable|image|mimes:jpg,jpeg,png,webp',
        ];
    }

    public function atributes()
    {
        return [
            'nombre' => 'nombre del productor',
            'fabricacion_id' => 'tipo de fabricación',
            'localidad' => 'localidad de origen',
        ];
    }

    public function messages()
    {
        // Para personalizar los mensajes de error de validación
        return [
            'nombre.required' => 'Debe ingresar un nombre al productor',
            'fabricacion_id.required' => 'Debe elegir un tipo de fabricación',
            'localidad.required' => 'Debe elegir una localidad de origen',
            'imagen.image' => 'Debe elegir un archivo de formato de imagen (jpg, png, webp)',
            'imagen.mimes' => 'Debe elegir un archivo con formato de imagen (jpg, png, webp)',
        ];
    }
}
