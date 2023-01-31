@extends('layouts.plantilla')
@section('title', 'Mostrar Imagen')

@section('content')
    <div class="row">
        <div class="col">
            <img class="img-fluid" src="{{ Storage::url($imagen->url) }}">
        </div>
    </div>
    <div class="row">
        <div class="col">
            <h4>Subida por: <a href="{{ route('usuarios.show', $imagen->usuario) }}">{{ $imagen->usuario->persona->nombre }}</a></h4>
        </div>
    </div>
@endsection
