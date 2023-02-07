@extends('layouts.plantilla')
@section('title', 'Mostrar Cervezas')

@section('content')

    <div class="mb-3">
        <div class="row">
            <div class="col">
                <x-botones.crear :route="route('cervezas.create')" />
            </div>
        </div>
    </div>

    <x-cervezas :cervezas="$cervezas" />
    {{ $cervezas->links() }}
@endsection
