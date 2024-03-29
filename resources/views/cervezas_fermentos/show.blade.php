@extends('layouts.plantilla')
@section('title', 'Mostrar Tipo de Fermento: ' . $cervezas_fermento->nombre)

@section('content')
    <div class="row">
        <div class="col">
            <h1>{{ $cervezas_fermento->nombre }}</h1>
            @if(!empty($cervezas_fermento->descripcion))<p class="mb-3">{{ $cervezas_fermento->descripcion }}</p>@endif
        </div>
    </div>

    @auth
        <div class="row mb-3">
            <div class="col">
                <x-botones.editar :route="route('cervezas_fermentos.edit', $cervezas_fermento)" />
                <x-botones.eliminar :route="route('cervezas_fermentos.destroy', $cervezas_fermento)" />
            </div>
        </div>
    @endauth

    <x-cervezas-familias :familias="$cervezas_fermento->familias" />

    <x-comentarios :comentarios="$cervezas_fermento->comentarios" />    
    @auth
        <x-formularios.comentario :route="route('cervezas_fermentos.comment', $cervezas_fermento)" />
    @endauth

@endsection
