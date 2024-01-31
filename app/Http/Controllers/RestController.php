<?php

namespace App\Http\Controllers;

use App\Models\Entrada;
use Illuminate\Http\Request;

class RestController extends Controller
{
    public function getAllEntries()
    {
        // Simula la obtención de todas las entradas desde el "servicio REST"
        $entradas = Entrada::all();

        return response()->json($entradas);
    }

    public function getEntry($id)
    {
        // Simula la obtención de una entrada específica por ID desde el "servicio REST"
        $entrada = Entrada::find($id);

        return response()->json($entrada);
    }

    public function storeEntry(Request $request)
    {
        try {
            // Verificar si los datos del formulario se están recibiendo correctamente
            if (!$request->has(['titulo', 'autor', 'fecha_publicacion', 'contenido'])) {
                throw new \Exception('Datos incompletos en la solicitud.', 400);
            }

            // Validar los datos del formulario
            $request->validate([
                'titulo' => 'required|string',
                'autor' => 'required|string',
                'fecha_publicacion' => 'required|date',
                'contenido' => 'required|string',
            ]);

            // Crear una nueva entrada con los datos validados
            $entrada = Entrada::create([
                'titulo' => $request->input('titulo'),
                'autor' => $request->input('autor'),
                'fecha_publicacion' => $request->input('fecha_publicacion'),
                'contenido' => $request->input('contenido'),
            ]);

            // Retornar la nueva entrada con un código 201 de creado
            return response()->json($entrada, 201);
        } catch (\Exception $e) {
            // En caso de error, retornar una respuesta con el código y descripción del error
            return response()->json([
                'error' => true,
                'code' => $e->getCode(),
                'message' => $e->getMessage(),
            ], $e->getCode());
        }
    }

}
