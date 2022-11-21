@extends('layouts.plantilla')
@section('title', 'Mostrar Divisiones Políticas')

@section('content')
    <div class="container">
        <a href="{{ route('divisiones_politicas.create') }}">Crear Nuevo</a>
        <ul>
            @foreach ($divisiones_politicas as $division_politica)
                <li><a
                        href="{{ route('divisiones_politicas.show', $division_politica->division_politica_id) }}">{{ $division_politica->nombre }}</a>
                </li>
            @endforeach
        </ul>
        {{ $divisiones_politicas->links() }}
    </div>
@endsection
