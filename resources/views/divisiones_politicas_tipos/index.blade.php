@extends('layouts.plantilla')
@section('title', 'Mostrar Divisiones Políticas Tipos')

@section('content')

    <div class="mb-3">
        <a href="{{ route('divisiones_politicas_tipos.create') }}" class="btn btn-primary" role="button" title="Crear Nuevo"><i class="fa-solid fa-square-plus"></i></a>
    </div>

    <x-division-politica-tipos :divisiones="$divisiones_politicas_tipos" />
    {{ $divisiones_politicas_tipos->links() }}
@endsection
