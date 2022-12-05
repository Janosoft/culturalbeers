<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            'nombre' => 'required|min:3',
            'fabricacion_id' => 'required',
            'localidad_id' => 'required',
        ];
    }

    public function atributes()
    {
        return [
            'nombre' => 'nombre del productor',
            'fabricacion_id' => 'tipo de fabricación',
            'localidad_id' => 'localidad de origen',
        ];
    }

    public function messages()
    {
        // Para personalizar los mensajes de error de validación        
        return [
            'nombre.required' => 'Debe ingresar un nombre a la cerveza',
            'fabricacion_id.required' => 'Debe elegir un tipo de fabricación',
            'localidad_id.required' => 'Debe elegir una localidad de origen',
        ];
        
    }
}
