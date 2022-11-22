@extends('layouts.plantilla')
@section('title', 'Mostrar Familia de Cervezas')

@section('content')
    <div class="container">
        <a href="{{ route('cervezas_familias.create') }}">Crear Nuevo</a>
        <ul>
            @foreach ($cervezas_familias as $cervezas_familia)
                <li><a href="{{ route('cervezas_familias.show', $cervezas_familia->familia_id) }}">{{ $cervezas_familia->nombre }}</a></li>
            @endforeach
        </ul>
        {{ $cervezas_familias->links() }}
    </div>
@endsection
