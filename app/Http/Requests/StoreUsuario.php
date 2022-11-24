<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUsuario extends FormRequest
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
            'email' => 'required|email:rfc,dns',
        ];
    }

    public function atributes()
    {
        return [
            'email' => 'dirección de email',
        ];
    }

    public function messages()
    {
        // Para personalizar los mensajes de error de validación

        /*
        return [
            'nombre.required' => 'Debe ingresar un nombre a la cerveza',
        ];
        */
    }
}
