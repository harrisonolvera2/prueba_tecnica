<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entrada;
use Illuminate\Support\Facades\Http;

class EntradaController extends Controller
{

    public function index(Request $request)
    {
        $query = $request->input('query');
        $entradas = Entrada::where('titulo', 'like', "%$query%")
                            ->orWhere('contenido', 'like', "%$query%")
                            ->orWhere('autor', 'like', "%$query%")
                            ->paginate(10);

        return view('entradas.index', compact('entradas', 'query'));
    }

    public function create()
    {
        return view('entradas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|max:255',
            'autor' => 'required|max:255',
            'fecha_publicacion' => 'required|date',
            'contenido' => 'required',
        ], [
            'titulo.required' => 'El campo Título es obligatorio.',
            'autor.required' => 'El campo Autor es obligatorio.',
            'fecha_publicacion.required' => 'El campo Fecha de Publicación es obligatorio.',
            'fecha_publicacion.date' => 'El campo Fecha de Publicación debe ser una fecha válida.',
            'contenido.required' => 'El campo Contenido es obligatorio.',
        ]);

        Entrada::create([
            'titulo' => $request->titulo,
            'autor' => $request->autor,
            'fecha_publicacion' => $request->fecha_publicacion,
            'contenido' => $request->contenido,
        ]);

        return redirect()->route('entradas.index')
            ->with('success', 'Entrada creada correctamente.');
    }

    public function show(Entrada $entrada)
    {
        return view('entradas.show', compact('entrada'));
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $entradas = Entrada::where('titulo', 'like', "%$search%")
                        ->orWhere('autor', 'like', "%$search%")
                        ->orWhere('contenido', 'like', "%$search%")
                        ->get();

        return view('entradas.index', compact('entradas'));
    }

    public function edit(Entrada $entrada)
    {
        return view('entradas.edit', compact('entrada'));
    }

    public function update(Request $request, Entrada $entrada)
    {
        $request->validate([
            'titulo' => 'required',
            'autor' => 'required',
            'fecha_publicacion' => 'required|date',
            'contenido' => 'required',
        ]);

        $entrada->update([
            'titulo' => $request->titulo,
            'autor' => $request->autor,
            'fecha_publicacion' => $request->fecha_publicacion,
            'contenido' => $request->contenido,
        ]);

        return redirect()->route('entradas.index')->with('success', 'Entrada actualizada correctamente.');
    }

    public function destroy(Entrada $entrada)
    {
        $entrada->delete();
        return redirect()->route('entradas.index')->with('success', 'Entrada eliminada correctamente.');
    }

}
