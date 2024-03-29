@extends('layouts.plantilla')
@section('title', 'Mostrar Categorías de Lugares')

@section('content')

    @auth
        <div class="mb-3">
            <div class="row">
                <div class="col">
                    <x-botones.crear :route="route('lugares_categorias.create')" />
                </div>
            </div>
        </div>
    @endauth

    <x-lugares-categorias :categorias="$lugares_categorias" />
    {{ $lugares_categorias->links() }}
@endsection
