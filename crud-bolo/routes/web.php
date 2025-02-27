<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudBoloController;
use App\Http\Controllers\UsuarioInteressadoboloController;

Route::prefix('api')->group(function () {
    Route::get('/bolos', [CrudBoloController::class, 'index']);
    Route::post('/bolos', [CrudBoloController::class, 'store']);
    Route::get('/bolos/{id}', [CrudBoloController::class, 'show']);
    Route::put('/bolos/{id}', [CrudBoloController::class, 'update']);
    Route::delete('/bolos/{id}', [CrudBoloController::class, 'destroy']);
    Route::get('/bolos-disponiveis', [CrudBoloController::class, 'bolosDisponiveis']);
    Route::post('/interessado/create', [UsuarioInteressadoboloController::class, 'store']);
    Route::get('/interessado', [UsuarioInteressadoboloController::class, 'index']);

});
