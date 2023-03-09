@extends('layouts.plantilla')
@section('title', 'Mostrar Cervezas')

@section('content')

    @auth
        <div class="mb-3">
            <div class="row">
                <div class="col">
                    <x-botones.crear :route="route('cervezas.create')" />
                </div>
            </div>
        </div>
    @endauth

    <x-cervezas :cervezas="$cervezas" />
    {{ $cervezas->links() }}
@endsection
