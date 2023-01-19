@extends('layouts.plantilla')
@section('title', 'Mostrar Localidades')

@section('content')
    <div class="container">
        <a href="{{ route('localidades.create') }}">Crear Nuevo</a>

        <x-localidades :localidades="$localidades"/>

        {{ $localidades->links() }}
    </div>
@endsection
