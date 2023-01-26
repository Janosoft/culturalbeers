@extends('layouts.plantilla')
@section('title', 'Mostrar Tipos de Fermentos')

@section('content')
    
    <div class="mb-3">
        <a href="{{ route('cervezas_fermentos.create') }}" class="btn btn-primary" role="button" title="Crear Nuevo"><i class="fa-solid fa-square-plus"></i></a>
    </div>
    
    <x-cervezas-fermentos :fermentos="$cervezas_fermentos" />
    {{ $cervezas_fermentos->links() }}
@endsection
