@extends('layouts.plantilla')
@section('title', 'Mostrar Familia de Cervezas')

@section('content')
    <div class="container">
        <a href="{{ route('cervezas_familias.create') }}">Crear Nueva</a>
        <div class="list-group">
            @foreach ($cervezas_familias as $cervezas_familia)
                <a href="{{ route('cervezas_familias.show', $cervezas_familia) }}" class="list-group-item list-group-item-action">{{ $cervezas_familia->nombre }}</a>
            @endforeach
        </div>
        {{ $cervezas_familias->links() }}
    </div>
@endsection
