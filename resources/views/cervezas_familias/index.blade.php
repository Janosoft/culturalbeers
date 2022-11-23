@extends('layouts.plantilla')
@section('title', 'Mostrar Familia de Cervezas')

@section('content')
    <div class="container">
        <a href="{{ route('cervezas_familias.create') }}">Crear Nueva</a>
        <ul>
            @foreach ($cervezas_familias as $cervezas_familia)
                <li><a href="{{ route('cervezas_familias.show', $cervezas_familia) }}">{{ $cervezas_familia->nombre }}</a></li>
            @endforeach
        </ul>
        {{ $cervezas_familias->links() }}
    </div>
@endsection
