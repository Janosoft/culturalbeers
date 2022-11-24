<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cerveza;
use Symfony\Contracts\Service\Attribute\Required;

class CervezaController extends Controller
{
    public function index()
    {
        $cervezas = Cerveza::orderBy('nombre')->paginate();
        return view('cervezas.index', compact('cervezas'));
    }

    public function create()
    {
        return view('cervezas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        
        $cerveza = new Cerveza();
        $cerveza->nombre = $request->nombre;
        $cerveza->save();
        return redirect()->route('cervezas.show', $cerveza);
    }

    public function show(Cerveza $cerveza)
    {
        return view('cervezas.show', compact('cerveza'));
    }

    public function edit(Cerveza $cerveza)
    {
        return view('cervezas.edit', compact('cerveza'));
    }

    public function update(Request $request, Cerveza $cerveza)
    {
        $cerveza->nombre = $request->nombre;
        $cerveza->save();
        return redirect()->route('cervezas.show', $cerveza);
    }
}
