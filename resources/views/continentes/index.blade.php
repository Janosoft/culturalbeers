@extends('layouts.plantilla')
@section('title', 'Mostrar Continentes')

@section('content')
    <div class="container">
        <ul>
            @foreach ($continentes as $continente)
                <li>{{ $continente->nombre }}</li>
            @endforeach
        </ul>
        {{ $continentes->links() }}
    </div>
@endsection
