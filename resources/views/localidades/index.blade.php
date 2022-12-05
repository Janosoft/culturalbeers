@extends('layouts.plantilla')
@section('title', 'Mostrar Localidades')

@section('content')
    <div class="container">
        <a href="{{ route('localidades.create') }}">Crear Nuevo</a>
        <div class="list-group">
            @foreach ($localidades as $localidad)
                <a href="{{ route('localidades.show', $localidad) }}" class="list-group-item list-group-item-action">{{ $localidad->nombre }}</a>
            @endforeach
        </div>
        {{ $localidades->links() }}
    </div>
@endsection
