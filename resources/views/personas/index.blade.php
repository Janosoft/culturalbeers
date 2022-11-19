@extends('layouts.plantilla')
@section('title', 'Mostrar Personas')

@section('content')
    <div class="container">
        <ul>
            @foreach ($personas as $persona)
                <li>{{ $persona->nombre }}</li>
            @endforeach
        </ul>
        {{ $personas->links() }}
    </div>
@endsection
