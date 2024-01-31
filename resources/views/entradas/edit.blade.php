<!-- resources/views/entradas/edit.blade.php -->

@extends('app')

@section('content')
    <h1 class="mb-4">Editar Entrada</h1>

    @if(session('success'))
        <p class="alert alert-success">{{ session('success') }}</p>
    @endif

    <form action="{{ route('entradas.update', $entrada->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="titulo" class="form-label">Título:</label>
            <input type="text" class="form-control" name="titulo" value="{{ $entrada->titulo }}" required>
        </div>

        <div class="mb-3">
            <label for="autor" class="form-label">Autor:</label>
            <input type="text" class="form-control" name="autor" value="{{ $entrada->autor }}" required>
        </div>

        <div class="mb-3">
            <label for="fecha_publicacion" class="form-label">Fecha de Publicación:</label>
            <input type="date" class="form-control" name="fecha_publicacion" value="{{ $entrada->fecha_publicacion }}" required>
        </div>

        <div class="mb-3">
            <label for="contenido" class="form-label">Contenido:</label>
            <textarea class="form-control" name="contenido" required>{{ $entrada->contenido }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Entrada</button>
    </form>
@endsection
