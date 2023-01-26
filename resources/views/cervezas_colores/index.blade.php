@extends('layouts.plantilla')
@section('title', 'Mostrar Colores de Cervezas')

@section('content')
    
    <div class="mb-3">
        <a href="{{ route('cervezas_colores.create') }}" class="btn btn-primary" role="button" title="Crear Nuevo"><i class="fa-solid fa-square-plus"></i></a>
    </div>
    
    <x-cervezas-colores :colores="$cervezas_colores" />
    {{ $cervezas_colores->links() }}
@endsection
