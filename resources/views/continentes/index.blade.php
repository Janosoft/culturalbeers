@extends('layouts.plantilla')
@section('title', 'Mostrar Continentes')

@section('content')
    
    <div class="mb-3">
        <a href="{{ route('continentes.create') }}" class="btn btn-primary" role="button" title="Crear Nuevo"><i class="fa-solid fa-square-plus"></i></a>
    </div>

    <x-continentes :continentes="$continentes" />
    {{ $continentes->links() }}
@endsection
