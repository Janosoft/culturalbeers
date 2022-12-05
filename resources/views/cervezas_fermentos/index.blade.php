@extends('layouts.plantilla')
@section('title', 'Mostrar Tipos de Fermentos')

@section('content')
    <div class="container">
        <a href="{{ route('cervezas_fermentos.create') }}">Crear Nuevo</a>
        <div class="list-group">
            @foreach ($cervezas_fermentos as $cervezas_fermento)
                <a href="{{ route('cervezas_fermentos.show', $cervezas_fermento) }}" class="list-group-item list-group-item-action">{{ $cervezas_fermento->nombre }}</a>
            @endforeach
        </div>
        {{ $cervezas_fermentos->links() }}
    </div>
@endsection
