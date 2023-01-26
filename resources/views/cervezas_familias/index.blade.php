@extends('layouts.plantilla')
@section('title', 'Mostrar Familia de Cervezas')

@section('content')
    
    <div class="mb-3">
        <a href="{{ route('cervezas_familias.create') }}" class="btn btn-primary" role="button" title="Crear Nueva"><i class="fa-solid fa-square-plus"></i></a>
    </div>
    
    <x-cervezas-familias :familias="$cervezas_familias" />
    {{ $cervezas_familias->links() }}
@endsection
