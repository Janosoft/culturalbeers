@extends('layouts.plantilla')
@section('title', 'Mostrar División Política: ' . $division_politica->nombre)

@section('content')
    <div class="row">
        <div class="col">
            <h1>{{ $division_politica->nombre }}</h1>
            <h2><x-links.pais :pais="$division_politica->pais" /></a></h2>
        </div>
    </div>

    @auth
        <div class="row mb-3">
            <div class="col">
                <x-botones.editar :route="route('divisiones_politicas.edit', $division_politica)" />
                <x-botones.eliminar :route="route('divisiones_politicas.destroy', $division_politica)" />
            </div>
        </div>
    @endauth

    <x-localidades :localidades="$division_politica->localidades" />
@endsection
