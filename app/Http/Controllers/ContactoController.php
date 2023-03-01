<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContacto;
use App\Mail\ContactoMailable;
use Illuminate\Support\Facades\Mail;

class ContactoController extends Controller
{
    public function index()
    {
        return view('contacto.index');
    }

    public function store(StoreContacto $request)
    {
        $correo = new ContactoMailable($request->all());
        Mail::to('janosoft@gmail.com')->send($correo); //TODO poner el email correcto

        session()->flash('statusTitle', 'Mensaje Enviado');
        session()->flash('statusMessage', 'El mensaje fue enviado correctamente.');
        session()->flash('statusColor', 'success');

        return redirect()->route('contacto.index');
    }
}
