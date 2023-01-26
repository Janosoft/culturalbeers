@extends('layouts.plantilla')
@section('title', 'Mostrar Tipos de Envases')

@section('content')
    
    <div class="mb-3">
        <a href="{{ route('cervezas_envases_tipos.create') }}" class="btn btn-primary" role="button" title="Crear Nuevo"><i class="fa-solid fa-square-plus"></i></a>
    </div>
    
    <x-cervezas-envases-tipos :envases="$cervezas_envases_tipos" />
    {{ $cervezas_envases_tipos->links() }}
@endsection
