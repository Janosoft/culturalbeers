@extends('layouts.plantilla')
@section('title', 'Mostrar Tipos de Envases')

@section('content')
    <div class="container">
        <a href="{{ route('cervezas_envases.create') }}">Crear Nuevo</a>
        <ul>
            @foreach ($cervezas_envases as $cervezas_envase)
                <li><a href="{{ route('cervezas_envases.show', $cervezas_envase->envase_id) }}">{{ $cervezas_envase->nombre }}</a></li>
            @endforeach
        </ul>
        {{ $cervezas_envases->links() }}
    </div>
@endsection
