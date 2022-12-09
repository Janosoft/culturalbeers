<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePersona extends FormRequest
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
            'apellido' => 'required|min:3',
            'localidad_id' => 'required',
            'imagen' => 'image',
        ];
    }

    public function atributes()
    {
        return [
            'nombre' => 'nombre de la persona',
            'apellido' => 'apellido de la persona',
            'localidad_id' => 'localidad actual',
        ];
    }

    public function messages()
    {
        // Para personalizar los mensajes de error de validación        
        return [
            'nombre.required' => 'Debe ingresar un nombre a la persona',
            'apellido.required' => 'Debe ingresar un apellido a la persona',
            'localidad_id.required' => 'Debe elegir una localidad actual',
            'imagen.image' => 'Debe elegir un archivo con formato de imagen (jpg, png, etc)',
        ];
        
    }
}
