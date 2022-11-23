<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CervezasFermento;

class CervezasFermentoController extends Controller
{
    public function index()
    {
        $cervezas_fermentos = CervezasFermento::paginate();
        return view('cervezas_fermentos.index', compact('cervezas_fermentos'));
    }

    public function create()
    {
        return view('cervezas_fermentos.create');
    }

    public function show($fermento_id)
    {
        $cervezas_fermento = CervezasFermento::find($fermento_id);
        return view('cervezas_fermentos.show', compact('cervezas_fermento'));
    }
}
