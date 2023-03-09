@extends('layouts.plantilla')
@section('title', 'Mostrar Divisiones Políticas')

@section('content')
    
    @auth
        <div class="mb-3">
            <div class="row">
                <div class="col">
                    <x-botones.crear :route="route('divisiones_politicas.create')" />
                </div>
            </div>
        </div>
    @endauth

    <x-divisiones-politicas :divisiones="$divisiones_politicas" />
    {{ $divisiones_politicas->links() }}
@endsection
