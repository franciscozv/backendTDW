<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\controllers\Api\PerroController;
use App\Http\controllers\Api\InteraccionController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('/perros')->group(function () {
    Route::get('/', [PerroController::class, 'index']);
    Route::post('/', [PerroController::class, 'store']);
    Route::get('/{id}', [PerroController::class, 'show']);
    Route::put('/{id}', [PerroController::class, 'update']);
    Route::delete('/{id}', [PerroController::class, 'destroy']);
    Route::get('{id}/interacciones', [PerroController::class, 'getInteracciones']);
});

Route::resource('/interacciones', InteraccionController::class)->only(['store', 'index', 'show']);

