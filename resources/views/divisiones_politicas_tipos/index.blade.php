@extends('layouts.plantilla')
@section('title', 'Mostrar Divisiones Políticas Tipos')

@section('content')

    <div class="mb-3">
        <div class="row">
            <div class="col">
                <x-botones.crear :route="route('divisiones_politicas_tipos.create')" />
            </div>
        </div>
    </div>

    <x-division-politica-tipos :tipos="$divisiones_politicas_tipos" />
    {{ $divisiones_politicas_tipos->links() }}
@endsection
