@extends('layouts.plantilla')
@section('title', 'Mostrar Tipo de Fermento: ' . $cervezas_fermento->nombre)

@section('content')
    <div class="row">
        <div class="col">
            <h1>{{ $cervezas_fermento->nombre }}</h1>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col">
            <a href="{{ route('cervezas_fermentos.edit', $cervezas_fermento) }}" class="btn btn-primary" title="Editar"><i class="fa-solid fa-pen-to-square"></i></a>
            <form action="{{ route('cervezas_fermentos.destroy', $cervezas_fermento) }}" method="POST"
                style="display: inline;">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger" title="Eliminar"><i class="fa-solid fa-trash"></i></button>
            </form>
        </div>
    </div>

    <x-cervezas-familias :familias="$cervezas_fermento->familias" />

    <x-comentarios :comentarios="$cervezas_fermento->comentarios" />

    <form action="{{ route('cervezas_fermentos.comment', $cervezas_fermento) }}" method="POST">
        @csrf
        
        <div class="input-group mb-3">
            <input type="text" class="form-control" name="comentario" placeholder="Nuevo Comentario" value="{{ old('comentario') }}">
            <button class="btn btn-outline-primary" type="submit" title="Comentar"><i class="fa-solid fa-comment-medical"></i></button>
        </div>
    </form>
@endsection
