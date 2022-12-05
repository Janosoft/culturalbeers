@extends('layouts.plantilla')
@section('title', 'Mostrar Divisiones Políticas')

@section('content')
    <div class="container">
        <a href="{{ route('divisiones_politicas.create') }}">Crear Nuevo</a>
        <div class="list-group">
            @foreach ($divisiones_politicas as $division_politica)
                <a href="{{ route('divisiones_politicas.show', $division_politica) }}" class="list-group-item list-group-item-action">{{ $division_politica->nombre }}</a>                
            @endforeach
        </div>
        {{ $divisiones_politicas->links() }}
    </div>
@endsection
