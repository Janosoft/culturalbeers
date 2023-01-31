@extends('layouts.plantilla')
@section('title', 'Mostrar Imagen')

@section('content')
    <div class="row">
        <div class="col">
            <img class="img-fluid" src="{{ Storage::url($imagen->url) }}">
            <h4>Fecha: {{date('d-m-Y H:m', strtotime($imagen->created_at));}}</h4>
            <h4>Subida por: <a href="{{ route('usuarios.show', $imagen->usuario) }}">{{ $imagen->usuario->persona->nombre }}</a></h4>
            <h4>Relacionada a: <a href="{{ URL::route($imagen->imageable->getTable() . '.show', $imagen->imageable) }}">{{ $imagen->imageable->nombre }}</a></h4>
        </div>
    </div>
@endsection
