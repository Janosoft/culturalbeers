<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCervezaEstilo extends FormRequest
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
            'familia_id' => 'required',
        ];
    }

    public function atributes()
    {
        return [
            'nombre' => 'nombre del estilo',
            'familia_id' => 'familia de cerveza',
        ];
    }

    public function messages()
    {
        // Para personalizar los mensajes de error de validación        
        return [
            'nombre.required' => 'Debe ingresar un nombre al estilo de cerveza',
            'familia_id.required' => 'Debe elegir una familia de cerveza a la que pertenece',
        ];
        
    }
}
