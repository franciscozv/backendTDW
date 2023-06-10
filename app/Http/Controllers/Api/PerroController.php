<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\PerroRequest;
use App\Models\Perro;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Spatie\FlareClient\Http\Response as HttpResponse;

use Illuminate\Support\Facades\Validator;

class PerroController extends Controller
{

    public function index()
    {
        $perro = Perro::all();
        return response()->json(["perro" => $perro], Response::HTTP_OK);
    }

    public function store(PerroRequest $request)
    {
        try {
            $perro = new Perro();
            $perro->nombre = $request->nombre;
            $perro->foto_url = $request->foto_url;
            $perro->descripcion = $request->descripcion;
            $perro->save();

            return response()->json(["perro" => $perro], Response::HTTP_OK);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }
    }

    public function show(string $id)
    {
        $perro = Perro::find($id);
        return response()->json(["perro" => $perro], Response::HTTP_OK);
    }


    public function update(Request $request, string $id)
{
    try {
        $perro = Perro::findOrFail($id);
        $perro->nombre = $request->nombre;
        $perro->foto_url = $request->foto_url;
        $perro->descripcion = $request->descripcion;
        $perro->save();

        return response()->json(["perro" => $perro], Response::HTTP_OK);
    } catch (Exception $e) {
        return response()->json(['error' => $e->getMessage()], Response::HTTP_BAD_REQUEST);
    }
}

    public function destroy(string $id)
{
    try {
        $perro = Perro::findOrFail($id);
        $perro->delete();

        return response()->json(['message' => 'Perro eliminado correctamente'], Response::HTTP_OK);
    } catch (Exception $e) {
        return response()->json(['error' => $e->getMessage()], Response::HTTP_BAD_REQUEST);
    }
}

public function getInteracciones(string $id)
{
    try {
            // Validar el ID del perro interesado
        $validator = Validator::make(['id' => $id], [
            'id' => 'required|exists:perros,id'
        ]);

        // Comprobar si la validación falla
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $perro = Perro::findOrFail($id);
        
        $aceptados = $perro->interaccionesComoInteresado()->where('preferencia', 'a')->pluck('perro_candidato_id')->toArray();
        $rechazados = $perro->interaccionesComoInteresado()->where('preferencia', 'r')->pluck('perro_candidato_id')->toArray();

        $perrosAceptados = Perro::whereIn('id', $aceptados)->get();
        $perrosRechazados = Perro::whereIn('id', $rechazados)->get();

        return response()->json([
            'aceptados' => $perrosAceptados,
            'rechazados' => $perrosRechazados
        ], Response::HTTP_OK);
    } catch (Exception $e) {
        return response()->json(['error' => $e->getMessage()], Response::HTTP_BAD_REQUEST);
    }
}
}
