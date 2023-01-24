@extends('layouts.plantilla')
@section('title', 'Búsqueda')

@section('content')
    @if (!empty($search))
        <div class="row">
            <div class="col">
                <h1>Buscando: {{ $search }}</h1>
            </div>
        </div>
    @else
        <div class="row justify-content-center d-lg-none">
            <div class="col-6">
                <form class="d-flex justify-content-center"" role="search" action="{{ route('search') }}" method="GET">
                    <input class="form-control me-2" type="search" name="search" style="width: 18rem;" required>
                    <button class="btn btn-outline-success" type="submit">Buscar</button>
                </form>
            </div>
        </div>
    @endif

    @if (!$cervezas->isEmpty())
        <x-cervezas :cervezas="$cervezas" />
    @endif

    @if (!$cervezas_colores->isEmpty())
        <x-cervezas-colores :colores="$cervezas_colores" />
    @endif

    @if (!$cervezas_envases_tipos->isEmpty())
        <x-cervezas-envases-tipos :envases="$cervezas_envases_tipos" />
    @endif

    @if (!$cervezas_estilos->isEmpty())
        <x-cervezas-estilos :estilos="$cervezas_estilos" />
    @endif

    @if (!$cervezas_familias->isEmpty())
        <x-cervezas-familias :familias="$cervezas_familias" />
    @endif

    @if (!$cervezas_fermentos->isEmpty())
        <x-cervezas-fermentos :fermentos="$cervezas_fermentos" />
    @endif

    @if (!$divisiones_politicas->isEmpty())
        <x-divisiones-politicas :divisiones="$divisiones_politicas" />
    @endif

    @if (!$localidades->isEmpty())
        <x-localidades :localidades="$localidades" />
    @endif

    @if (!$paises->isEmpty())
        <x-paises :paises="$paises" />
    @endif

    @if (!$personas->isEmpty())
        <x-personas :personas="$personas" />
    @endif

    @if (!$productores->isEmpty())
        <x-productores :productores="$productores" />
    @endif
@endsection
