<?php

namespace App\Http\Controllers;

use App\Models\CervezasFermento;
use App\Http\Requests\StoreCervezaFermento;

class CervezasFermentoController extends Controller
{
    public function index()
    {
        $cervezas_fermentos = CervezasFermento::orderBy('nombre')->paginate();
        return view('cervezas_fermentos.index', compact('cervezas_fermentos'));
    }

    public function create()
    {
        return view('cervezas_fermentos.create');
    }

    public function store(StoreCervezaFermento $request)
    {
        $cervezas_fermento = CervezasFermento::create($request->all());
        return redirect()->route('cervezas_fermentos.show', $cervezas_fermento);
    }

    public function show(CervezasFermento $cervezas_fermento)
    {
        return view('cervezas_fermentos.show', compact('cervezas_fermento'));
    }

    public function edit(CervezasFermento $cervezas_fermento)
    {
        return view('cervezas_fermentos.edit', compact('cervezas_fermento'));
    }

    public function update(StoreCervezaFermento $request, CervezasFermento $cervezas_fermento)
    {
        $cervezas_fermento->update($request->all());
        return redirect()->route('cervezas_fermentos.show', $cervezas_fermento);
    }
    
    public function destroy(CervezasFermento $cervezas_fermento)
    {
        $cervezas_fermento->delete();
        return redirect()->route('cervezas_fermentos.index');
    }
}
