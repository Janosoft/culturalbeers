@extends('layouts.plantilla')
@section('title', 'Mostrar Estilos de Cervezas')

@section('content')

    <div class="mb-3">
        <a href="{{ route('cervezas_estilos.create') }}" class="btn btn-primary" role="button" title="Crear Nuevo"><i class="fa-solid fa-square-plus"></i></a>
    </div>
    
    <x-cervezas-estilos :estilos="$cervezas_estilos" />
    {{ $cervezas_estilos->links() }}
@endsection
