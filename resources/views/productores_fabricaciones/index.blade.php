@extends('layouts.plantilla')
@section('title', 'Mostrar Tipos de Fabricación')

@section('content')
    
    <div class="mb-3">
        <a href="{{ route('productores.productores_fabricaciones') }}" class="btn btn-primary" role="button" title="Crear Nuevo"><i class="fa-solid fa-square-plus"></i></a>
    </div>
    
    <x-productores-fabricaciones :fabricaciones="$productores_fabricaciones" />
    {{ $productores_fabricaciones->links() }}
@endsection
