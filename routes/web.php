<?php

use App\Http\Controllers\CambiandoElSignificadoController;
use App\Http\Controllers\TeAseguroRespuestasController;
use Illuminate\Support\Facades\Route;

/* Route::get('/', function () {
    return view('welcome');
}); */

Route::get('/', [CambiandoElSignificadoController::class, 'index'])->name('index.cambiando');

Route::get('/tar', [TeAseguroRespuestasController::class, 'index'])->name('index.tar');

use App\Models\PreguntaFrecuente;

Route::get('/prueba', function () {
    $preguntas = PreguntaFrecuente::all();

    foreach ($preguntas as $pregunta) {
        var_dump($pregunta);
    }

    die();
});