@extends('layouts.plantilla')
@section('title', 'Mostrar Cervezas')

@section('content')
    <div class="container">
        <a href="{{ route('cervezas.create') }}">Crear Nueva</a>
        <div class="list-group">
            @foreach ($cervezas as $cerveza)
                <a href="{{ route('cervezas.show', $cerveza->slug) }}" class="list-group-item list-group-item-action">{{ $cerveza->nombre  }}</a>
            @endforeach
        </div>
        {{ $cervezas->links() }}
    </div>
@endsection
