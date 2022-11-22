@extends('layouts.plantilla')
@section('title', 'Mostrar Estilos de Cervezas')

@section('content')
    <div class="container">
        <a href="{{ route('cervezas_estilos.create') }}">Crear Nuevo</a>
        <ul>
            @foreach ($cervezas_estilos as $cervezas_estilo)
                <li><a href="{{ route('cervezas_estilos.show', $cervezas_estilo->estilo_id) }}">{{ $cervezas_estilo->nombre }}</a></li>
            @endforeach
        </ul>
        {{ $cervezas_estilos->links() }}
    </div>
@endsection
