@extends('layouts.plantilla')
@section('title', 'Mostrar Divisiones Políticas Tipos')

@section('content')
    <div class="container">
        <a href="{{ route('divisiones_politicas_tipos.create') }}">Crear Nuevo</a>
        <div class="list-group">
            @foreach ($divisiones_politicas_tipos as $divisiones_politicas_tipo)
                    <a href="{{ route('divisiones_politicas_tipos.show', $divisiones_politicas_tipo) }}" class="list-group-item list-group-item-action">{{ $divisiones_politicas_tipo->nombre }}</a>
            @endforeach
        </div>
        {{ $divisiones_politicas_tipos->links() }}
    </div>
@endsection
