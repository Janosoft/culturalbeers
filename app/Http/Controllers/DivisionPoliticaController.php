<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DivisionPolitica;

class DivisionPoliticaController extends Controller
{
    public function index()
    {
        $divisiones_politicas = DivisionPolitica::paginate();
        return view('divisiones_politicas.index', compact('divisiones_politicas'));
    }

    public function create()
    {
        return view('divisiones_politicas.create');
    }

    public function show($division_politica_id)
    {
        $division_politica = DivisionPolitica::find($division_politica_id);
        return view('divisiones_politicas.show', compact('division_politica'));
    }
}
