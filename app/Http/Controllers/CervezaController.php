<?php

namespace App\Http\Controllers;

use App\Models\Cerveza;
use App\Http\Requests\StoreCerveza;

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

    public function store(StoreCerveza $request)
    {
        $cerveza = Cerveza::create($request->all());
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

    public function update(StoreCerveza $request, Cerveza $cerveza)
    {
        $cerveza->update($request->all());
        return redirect()->route('cervezas.show', $cerveza);
    }

    public function destroy(Cerveza $cerveza)
    {
        $cerveza->delete();
        return redirect()->route('cervezas.index', $cerveza);
    }
}
