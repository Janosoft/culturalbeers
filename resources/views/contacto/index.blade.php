@extends('layouts.plantilla')
@section('title', 'Contacto')

@section('content')
    <form class="form_contacto" action="{{ route('contacto.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre y Apellido</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre') }}">
            @error('nombre')
                <div id="nombreHelp" class="form-text">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Dirección de Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
            @error('email')
                <div id="emailHelp" class="form-text">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="comentario" class="form-label">Comentario</label>
            <textarea class="form-control" placeholder="Deje aquí su comentario" id="comentario" name="comentario"> {{ old('comentario') }}</textarea>
            @error('comentario')
                <div id="comentarioHelp" class="form-text">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
    @if (session('info'))
        <script>
            alert('{{ session('info') }}');
        </script>
    @endif
@endsection
