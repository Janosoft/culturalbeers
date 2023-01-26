@extends('layouts.plantilla')
@section('title', 'Mostrar Personas')

@section('content')
    
    <div class="mb-3">
        <a href="{{ route('personas.create') }}" class="btn btn-primary" role="button" title="Crear Nueva"><i class="fa-solid fa-square-plus"></i></a>
    </div>
    
    <x-personas :personas="$personas" />
    {{ $personas->links() }}
@endsection
