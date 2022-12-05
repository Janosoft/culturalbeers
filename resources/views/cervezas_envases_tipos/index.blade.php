@extends('layouts.plantilla')
@section('title', 'Mostrar Tipos de Envases')

@section('content')
    <div class="container">
        <a href="{{ route('cervezas_envases_tipos.create') }}">Crear Nuevo</a>
        <div class="list-group">
            @foreach ($cervezas_envases_tipos as $cervezas_envase_tipo)
                <a href="{{ route('cervezas_envases_tipos.show', $cervezas_envase_tipo) }}" class="list-group-item list-group-item-action">{{ $cervezas_envase_tipo->nombre }}</a>
            @endforeach
        </div>
        {{ $cervezas_envases_tipos->links() }}
    </div>
@endsection
