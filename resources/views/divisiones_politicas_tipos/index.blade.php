@extends('layouts.plantilla')
@section('title', 'Mostrar Divisiones Políticas Tipos')

@section('content')
    <div class="container">
        <a href="{{ route('divisiones_politicas_tipos.create') }}">Crear Nuevo</a>
        
        <x-division-politica-tipos :divisiones="$divisiones_politicas_tipos"/>

        {{ $divisiones_politicas_tipos->links() }}
    </div>
@endsection
