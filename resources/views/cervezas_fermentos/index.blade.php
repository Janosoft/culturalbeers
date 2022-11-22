@extends('layouts.plantilla')
@section('title', 'Mostrar Tipos de Fermentos')

@section('content')
    <div class="container">
        <a href="{{ route('cervezas_fermentos.create') }}">Crear Nuevo</a>
        <ul>
            @foreach ($cervezas_fermentos as $cervezas_fermento)
                <li><a href="{{ route('cervezas_fermentos.show', $cervezas_fermento->fermento_id) }}">{{ $cervezas_fermento->nombre }}</a></li>
            @endforeach
        </ul>
        {{ $cervezas_fermentos->links() }}
    </div>
@endsection
