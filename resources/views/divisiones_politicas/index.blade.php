@extends('layouts.plantilla')
@section('title', 'Mostrar Divisiones Políticas')

@section('content')
    <div class="container">
        <ul>
            @foreach ($divisiones_politicas as $division_politica)
                <li>{{ $division_politica->nombre }}</li>
            @endforeach
        </ul>
        {{ $divisiones_politicas->links() }}
    </div>
@endsection