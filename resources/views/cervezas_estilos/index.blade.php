@extends('layouts.plantilla')
@section('title', 'Mostrar Estilos de Cervezas')

@section('content')
    <div class="container">
        <a href="{{ route('cervezas_estilos.create') }}">Crear Nuevo</a>
       
        <x-cervezas-estilos :estilos="$cervezas_estilos"/>

        {{ $cervezas_estilos->links() }}
    </div>
@endsection
