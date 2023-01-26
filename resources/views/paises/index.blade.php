@extends('layouts.plantilla')
@section('title', 'Mostrar Paises')

@section('content')
    
    <div class="mb-3">
        <a href="{{ route('paises.create') }}" class="btn btn-primary" role="button" title="Crear Nuevo"><i class="fa-solid fa-square-plus"></i></a>
    </div>
    
    <x-paises :paises="$paises" />
    {{ $paises->links() }}
@endsection
