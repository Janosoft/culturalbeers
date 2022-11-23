@extends('layouts.plantilla')
@section('title', 'Mostrar Tipos de Envases')

@section('content')
    <div class="container">
        <a href="{{ route('cervezas_envases_tipos.create') }}">Crear Nuevo</a>
        <ul>
            @foreach ($cervezas_envases_tipos as $cervezas_envase_tipo)
                <li><a href="{{ route('cervezas_envases_tipos.show', $cervezas_envase_tipo) }}">{{ $cervezas_envase_tipo->nombre }}</a></li>
            @endforeach
        </ul>
        {{ $cervezas_envases_tipos->links() }}
    </div>
@endsection
