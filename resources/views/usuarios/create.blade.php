@extends('layouts.plantilla')
@section('title', 'Crear Usuario')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="{{ route('usuarios.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" name="email" placeholder="Email">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Crear</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection