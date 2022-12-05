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
            'persona_id' => 'required',
            'password' => 'required|min:10',
        ];
    }

    public function atributes()
    {
        return [
            'email' => 'dirección de email',
            'persona_id' => 'persona',
            'password' => 'contraseña',
        ];
    }

    public function messages()
    {
        // Para personalizar los mensajes de error de validación        
        return [
            'email.required' => 'Debe ingresar un email de contacto',
            'persona_id.required' => 'Debe elegir una persona',
            'password.required' => 'Debe ingresar una contraseña',
        ];
    }
}
