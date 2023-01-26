@extends('layouts.plantilla')
@section('title', 'Mostrar Comentarios')

@section('content')

    <x-comentarios :comentarios="$comentarios" />
    {{ $comentarios->links() }}
@endsection