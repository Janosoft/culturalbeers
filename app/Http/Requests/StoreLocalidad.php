<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreLocalidad extends FormRequest
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
                Rule::unique('localidades')->ignore($this->localidad),
            ],
            'division_politica_id' => 'required',
        ];
    }

    public function atributes()
    {
        return [
            'nombre' => 'nombre de la localidad',
            'division_politica_id' => 'división política',
        ];
    }

    public function messages()
    {
        // Para personalizar los mensajes de error de validación
        return [
            'nombre.required' => 'Debe ingresar un nombre a la localidad',
            'division_politica_id.required' => 'Debe elegir una división política',
        ];
    }
}
