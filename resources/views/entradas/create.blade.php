@extends('app') <!-- Extiende el layout app.blade.php -->

@section('content')

    <div class="container mt-5">
        <h1>Crear Nueva Entrada</h1>

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

        @if($errors->any())
            <ul class="list-unstyled text-danger">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif   

        <form action="{{ route('entradas.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="titulo" class="form-label">Título:</label>
                <input type="text" class="form-control" name="titulo" required>
            </div>

            <div class="mb-3">
                <label for="autor" class="form-label">Autor:</label>
                <input type="text" class="form-control" name="autor" required>
            </div>

            <div class="mb-3">
                <label for="fecha_publicacion" class="form-label">Fecha de Publicación:</label>
                <input type="date" class="form-control" name="fecha_publicacion" required>
            </div>

            <div class="mb-3">
                <label for="contenido" class="form-label">Contenido:</label>
                <textarea class="form-control" name="contenido" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Guardar Entrada</button>
        </form>
    </div>

@endsection
