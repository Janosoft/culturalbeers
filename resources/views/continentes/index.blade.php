@extends('layouts.plantilla')
@section('title', 'Mostrar Continentes')

@section('content')
    <div class="container">
        <a href="{{ route('continentes.create') }}">Crear Nuevo</a>
        
        <x-continentes :continentes="$continentes"/>

        {{ $continentes->links() }}
    </div>
@endsection
