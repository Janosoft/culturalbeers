@extends('layouts.plantilla')
@section('title', 'Mostrar Categorías de Lugares')

@section('content')

    <div class="mb-3">
        <div class="row">
            <div class="col">
                <x-botones.crear :route="route('lugares_categorias.create')" />
            </div>
        </div>
    </div>

    <x-lugares-categorias :categorias="$lugares_categorias" />
    {{ $lugares_categorias->links() }}
@endsection
