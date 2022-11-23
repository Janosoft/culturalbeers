@extends('layouts.plantilla')
@section('title', 'Mostrar Divisiones Políticas Tipos')

@section('content')
    <div class="container">
        <a href="{{ route('divisiones_politicas_tipos.create') }}">Crear Nuevo</a>
        <ul>
            @foreach ($divisiones_politicas_tipos as $divisiones_politicas_tipo)
                <li>
                    <a href="{{ route('divisiones_politicas_tipos.show', $divisiones_politicas_tipo) }}">{{ $divisiones_politicas_tipo->nombre }}</a>
                </li>
            @endforeach
        </ul>
        {{ $divisiones_politicas_tipos->links() }}
    </div>
@endsection
