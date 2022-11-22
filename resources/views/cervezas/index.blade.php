@extends('layouts.plantilla')
@section('title', 'Mostrar Cervezas')

@section('content')
    <div class="container">
        <a href="{{ route('cervezas.create') }}">Crear Nueva</a>
        <ul>
            @foreach ($cervezas as $cerveza)
                <li><a href="{{ route('cervezas.show', $cerveza->cerveza_id) }}">{{ $cerveza->nombre }}</a></li>
            @endforeach
        </ul>
        {{ $cervezas->links() }}
    </div>
@endsection
