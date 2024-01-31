<!-- resources/views/entradas/show.blade.php -->

@extends('app')

@section('content')
    <h1>{{ $entrada->titulo }}</h1>

    <div class="mb-3">
        <p><strong>Autor:</strong> {{ $entrada->autor }}</p>
    </div>

    <div class="mb-3">
        <p><strong>Fecha de Publicación:</strong> ({{ \Carbon\Carbon::parse($entrada->fecha_publicacion)->format('d/m/Y') }})</p>
    </div>

    <div class="mb-3">
        <p><strong>Contenido:</strong> {{ $entrada->contenido }}</p>
    </div>

    <div class="mb-3">
        <a href="{{ route('entradas.edit', $entrada->id) }}" class="btn btn-warning">Editar Entrada</a>

        <form action="{{ route('entradas.destroy', $entrada->id) }}" method="POST" style="display: inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar esta entrada?')">Eliminar Entrada</button>
        </form>
    </div>
@endsection
