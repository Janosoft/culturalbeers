@extends('layouts.plantilla')
@section('title', 'Mostrar Localidades')

@section('content')
    <div class="container">
        <a href="{{ route('localidades.create') }}">Crear Nuevo</a>
        <ul>
            @foreach ($localidades as $localidad)
                <li><a
                        href="{{ route('localidades.show', $localidad->localidad_id) }}">{{ $localidad->nombre }}</a>
                </li>
            @endforeach
        </ul>
        {{ $localidades->links() }}
    </div>
@endsection
