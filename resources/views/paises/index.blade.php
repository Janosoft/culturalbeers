@extends('layouts.plantilla')
@section('title', 'Mostrar Paises')

@section('content')
    <div class="container">
        <a href="{{ route('paises.create') }}">Crear Nuevo</a>
        
        <x-paises :paises="$paises"/>

        {{ $paises->links() }}
    </div>
@endsection
