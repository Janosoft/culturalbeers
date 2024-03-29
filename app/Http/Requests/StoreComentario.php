<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreComentario extends FormRequest
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
            'comentario' => 'required|min:10',
        ];
    }

    public function atributes()
    {
        return [
            'comentario' => 'texto del comentario',
        ];
    }

    public function messages()
    {
        return [
            'comentario.required' => 'El comentario no puede estar vacío',
            'comentario.min' => 'El comentario debe tener al menos 10 caracteres',
        ];
    }
}
