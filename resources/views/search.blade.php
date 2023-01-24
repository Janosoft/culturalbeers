@extends('layouts.plantilla')
@section('title', 'Búsqueda')

@section('content')
    <h1>Buscando: {{$search}}</h1>
    @if (!$cervezas->isEmpty()) <x-cervezas :cervezas="$cervezas"/>@endif
    @if (!$cervezas_colores->isEmpty()) <x-cervezas-colores :colores="$cervezas_colores"/>@endif
    @if (!$cervezas_envases_tipos->isEmpty()) <x-cervezas-envases-tipos :envases="$cervezas_envases_tipos"/>@endif
    @if (!$cervezas_estilos->isEmpty()) <x-cervezas-estilos :estilos="$cervezas_estilos"/>@endif
    @if (!$cervezas_familias->isEmpty()) <x-cervezas-familias :familias="$cervezas_familias"/>@endif
    @if (!$cervezas_fermentos->isEmpty()) <x-cervezas-fermentos :fermentos="$cervezas_fermentos"/>@endif
    @if (!$divisiones_politicas->isEmpty()) <x-divisiones-politicas :divisiones="$divisiones_politicas"/>@endif
    @if (!$localidades->isEmpty()) <x-localidades :localidades="$localidades"/>@endif
    @if (!$paises->isEmpty()) <x-paises :paises="$paises"/>@endif
    @if (!$personas->isEmpty()) <x-personas :personas="$personas" />@endif
    @if (!$productores->isEmpty()) <x-productores :productores="$productores" />@endif    
@endsection