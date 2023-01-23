<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCerveza extends FormRequest
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
            'nombre' => 'required|unique:cervezas,nombre, productor_id = '.$this->productor_id.',cerveza_id,productor_id,'.$this->productor_id.'|min:3',
            'productor_id' => 'required',
            'color_id' => 'required',
            'estilo_id' => 'required',
            'envases' => 'required',
            'imagen' => 'image',
        ];
    }

    public function atributes()
    {
        return [
            'nombre' => 'nombre de la cerveza',
            'productor_id' => 'productor',
            'color_id' => 'color',
            'estilo_id' => 'estilo',
            'envases' => 'tipo de envase',
        ];
    }

    public function messages()
    {
        // Para personalizar los mensajes de error de validación
        return [
            'nombre.required' => 'Debe ingresar un nombre a la cerveza',
            'productor_id.required' => 'Debe elegir al productor de la cerveza',
            'color_id.required' => 'Debe elegir el color de la cerveza',
            'estilo_id.required' => 'Debe elegir el estilo de la cerveza',
            'envases.required' => 'Debe elegir el tipo de envase de la cerveza',
            'imagen.image' => 'Debe elegir un archivo con formato de imagen (jpg, png, etc)',
        ];
    }
}
