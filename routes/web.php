<?php

use App\Http\Controllers\CambiandoElSignificadoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TeAseguroRespuestasController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CambiandoElSignificadoController::class, 'index'])->name('index.cambiando');

Route::get('/tar', [TeAseguroRespuestasController::class, 'index'])->name('index.tar');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
require __DIR__.'/platform.php';
