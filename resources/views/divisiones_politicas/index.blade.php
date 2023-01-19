@extends('layouts.plantilla')
@section('title', 'Mostrar Divisiones Políticas')

@section('content')
    <div class="container">
        <a href="{{ route('divisiones_politicas.create') }}">Crear Nuevo</a>

        <x-divisiones-politicas :divisiones="$divisiones_politicas"/>

        {{ $divisiones_politicas->links() }}
    </div>
@endsection
