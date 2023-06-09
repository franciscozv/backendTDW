<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Interaccion;
use App\Http\Requests\InteraccionRequest;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Response;
use Spatie\FlareClient\Http\Response as HttpResponse;

class InteraccionController extends Controller
{
    public function index()
    {
        $interaccion = Interaccion::all();
        return response()->json(["interaccion" => $interaccion], Response::HTTP_OK);
    }

    public function store(InteraccionRequest $request)
    {
        try {
            $validatedData = $request->validated();
            $interaccion = Interaccion::create($validatedData);
            return response()->json($interaccion, 201);
        } catch (ValidationException $exception) {
            return response()->json(['errors' => $exception->errors()], 422);
        }
    }

    public function show(string $id)
    {
        $interacciones = Interaccion::find($id);
        return $interacciones;

    }
}