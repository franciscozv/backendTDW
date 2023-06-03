<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Perro;
use App\Http\Requests\PerroRequest;

class PerroController extends Controller
{

    public function index()
    {
        $perros = Perro::all();
        return $perros;
    }

    public function store(PerroRequest $request)
    {
        $request->validated(); // Realizar la validación de los datos

        $perro = new Perro();
        $perro->nombre = $request->nombre;
        $perro->foto_url = $request->foto_url;
        $perro->descripcion = $request->descripcion;

        $perro->save();

        return response()->json($perro, 201);
    }

    public function show(string $id)
    {
        $perro = Perro::find($id);
        return $perro;

    }


    public function update(Request $request, string $id)
    {
        $perro = Perro::findOrFail($request->id);

        $perro->nombre = $request->nombre;
        $perro->foto_url = $request->foto_url;
        $perro->descripcion = $request->descripcion;
        $perro->save();

        return $perro;
    }

    public function destroy(string $id)
    {
        $perro = Perro::destroy($id);
        return $perro;
    }

}
