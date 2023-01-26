@extends('layouts.plantilla')
@section('title', 'Mostrar Divisiones Políticas')

@section('content')
    
    <div class="mb-3">
        <a href="{{ route('divisiones_politicas.create') }}" class="btn btn-primary" role="button" title="Crear Nueva"><i class="fa-solid fa-square-plus"></i></a>
    </div>

    <x-divisiones-politicas :divisiones="$divisiones_politicas" />
    {{ $divisiones_politicas->links() }}
@endsection
