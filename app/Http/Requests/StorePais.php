<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePais extends FormRequest
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
            'nombre' => 'required|min:3',
            'continente_id' => 'required',
            'divisiones_politicas_tipo_id' => 'required',
            'imagen' => 'image',
        ];
    }

    public function atributes()
    {
        return [
            'nombre' => 'nombre del país',
            'continente_id' => 'continente',
            'divisiones_politicas_tipo_id' => 'tipo de división política',
        ];
    }

    public function messages()
    {
        // Para personalizar los mensajes de error de validación        
        return [
            'nombre.required' => 'Debe ingresar un nombre al país',
            'continente_id.required' => 'Debe elegir el continente al que pertenece',
            'divisiones_politicas_tipo_id.required' => 'Debe elegir el tipo de división política que posee',
            'imagen.image' => 'Debe elegir un archivo con formato de imagen (jpg, png, etc)',
        ];
        
    }
}
