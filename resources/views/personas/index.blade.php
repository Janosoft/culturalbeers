@extends('layouts.plantilla')
@section('title', 'Mostrar Personas')

@section('content')
    <a href="{{ route('personas.create') }}">Crear Nueva</a>
    <x-personas :personas="$personas" />
    {{ $personas->links() }}
@endsection
