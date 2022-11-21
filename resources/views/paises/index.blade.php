@extends('layouts.plantilla')
@section('title', 'Mostrar Paises')

@section('content')
    <div class="container">
        <ul>
            @foreach ($paises as $pais)
                <li>{{ $pais->nombre }}</li>
            @endforeach
        </ul>
        {{ $paises->links() }}
    </div>
@endsection