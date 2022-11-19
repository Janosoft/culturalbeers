@extends('layouts.plantilla')
@section('title', 'Mostrar Divisiones Políticas Tipos')

@section('content')
    <div class="container">
        <ul>
            @foreach ($divisiones_politicas_tipos as $divisiones_politicas_tipo)
                <li>{{ $divisiones_politicas_tipo->nombre }}</li>
            @endforeach
        </ul>
        {{ $divisiones_politicas_tipos->links() }}
    </div>
@endsection