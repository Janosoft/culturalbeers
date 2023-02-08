<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'nombre' => [
                'required',
                'min:3',
                Rule::unique('cervezas')->ignore($this->cerveza),
            ],
            'IBU' => 'required|min:0|max:100',
            'ABV' => 'required|min:0|max:100',
            'productor_id' => 'required',
            'color_id' => 'required',
            'estilo_id' => 'required',
            'envases' => 'required',
            'imagen' => 'image|mimes:jpg,png',
        ];
    }

    public function atributes()
    {
        return [
            'nombre' => 'nombre de la cerveza',
            'IBU' => 'International Biterness Unit',
            'ABV' => 'Alcohol By Volume',
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
            'IBU.required' => 'Debe ingresar el nivel de amargor de la cerveza',
            'IBU.min' => 'El nivel de amargor de la cerveza no puede ser menor a 0',
            'IBU.max' => 'El nivel de amargor de la cerveza no puede ser mayor a 100',
            'ABV.required' => 'Debe ingresar la cantidad de alcohol que contiene cerveza',
            'ABV.min' => 'La cantidad de alcohol que contiene cerveza no puede ser menor a 0',
            'ABV.max' => 'La cantidad de alcohol que contiene cerveza no puede ser mayor a 100',
            'productor_id.required' => 'Debe elegir al productor de la cerveza',
            'color_id.required' => 'Debe elegir el color de la cerveza',
            'estilo_id.required' => 'Debe elegir el estilo de la cerveza',
            'envases.required' => 'Debe elegir el tipo de envase de la cerveza',
            'imagen.image' => 'Debe elegir un archivo con formato de imagen (jpg, png)',
            'imagen.mimes' => 'Debe elegir un archivo con formato de imagen (jpg, png)',
        ];
    }
}
