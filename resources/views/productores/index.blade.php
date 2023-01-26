@extends('layouts.plantilla')
@section('title', 'Mostrar Productores de Cervezas')

@section('content')
    
    <div class="mb-3">
        <a href="{{ route('productores.create') }}" class="btn btn-primary" role="button" title="Crear Nuevo"><i class="fa-solid fa-square-plus"></i></a>
    </div>

    <x-productores :productores="$productores" />
    {{ $productores->links() }}
@endsection
