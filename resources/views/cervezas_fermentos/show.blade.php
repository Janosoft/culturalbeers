@extends('layouts.plantilla')
@section('title', 'Mostrar Tipo de Fermento: ' . $cervezas_fermento->nombre)

@section('content')
    <div class="container">

        <div class="row">
            <div class="col">
                <h1>{{ $cervezas_fermento->nombre }}</h1>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                <a href="{{ route('cervezas_fermentos.edit', $cervezas_fermento) }}" class="btn btn-primary"> Editar</a>
                <form action="{{ route('cervezas_fermentos.destroy', $cervezas_fermento) }}" method="POST"
                    style="display: inline;">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger"> Eliminar</button>
                </form>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                <div class="list-group">
                    @foreach ($cervezas_fermento->familias as $familia)
                        <a href="{{ route('cervezas_familias.show', $familia) }}" class="list-group-item list-group-item-action">{{ $familia->nombre }}</a>
                    @endforeach
                    </div>
            </div>
        </div>

        <hr>

        @forelse ($cervezas_fermento->comentarios as $comentario)
            <div class="row mb-3">
                <div class="col">
                    {{ $comentario->comentario }}
                </div>
            </div>
        @empty
            <div class="row mb-3">
                <div class="col">
                    No hay Comentarios
                </div>
            </div>
        @endforelse

    </div>
@endsection