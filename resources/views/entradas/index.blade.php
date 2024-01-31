<!-- resources/views/entradas/index.blade.php -->

@extends('app')

@section('content')
    <div class="mb-3">
        <form class="ml-3" action="{{ route('entradas.index') }}" method="GET">
            <div class="input-group">
                <input type="text" class="form-control" name="query" value="{{ $query ?? '' }}" placeholder="Buscar...">
                <button class="btn btn-outline-secondary" type="submit">Buscar</button>
            </div>
        </form>
    </div>

    <h1 class="mb-4">Listado de Entradas</h1>

    @if(count($entradas) > 0)
        <ul class="list-group">
            @foreach($entradas as $entrada)
                <li class="list-group-item">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">{{ $entrada['titulo'] }}</h5>
                        <small>{{ $entrada['autor'] }} ({{ \Carbon\Carbon::parse($entrada['fecha_publicacion'])->format('d/m/Y') }})</small>
                    </div>
                    <p class="mb-1">{{ substr($entrada->contenido, 0, 70) }}...</p>
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('entradas.show', $entrada->id) }}" class="btn btn-info btn-sm">Ver Detalles</a>
                        <a href="{{ route('entradas.edit', $entrada->id) }}" class="btn btn-warning btn-sm mx-1">Editar</a>
                        <form action="{{ route('entradas.destroy', $entrada->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('¿Estás seguro de eliminar esta entrada?')" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>

        {{ $entradas->links() }} <!-- Muestra la paginación -->
    @else
        <p>No hay entradas disponibles.</p>
    @endif

    @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    
    @if(session('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
    @endif
@endsection
