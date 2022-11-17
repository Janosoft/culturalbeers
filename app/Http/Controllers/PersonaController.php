<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersonaController extends Controller
{
    public function index()
    {
        return view('personas.index');
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
