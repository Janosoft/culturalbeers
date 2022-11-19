<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persona;

class PersonaController extends Controller
{
    public function index()
    {
        $personas= Persona::paginate();
        return view('personas.index', compact('personas'));        
    }

    public function create()
    {
        return view('personas.create');
    }

    public function show($persona)
    {
        return view('personas.show', compact('persona'));
    }
}
