<?php

namespace App\Http\Controllers;

use App\Models\PreguntaFrecuente;
use Illuminate\Http\Request;

class TeAseguroRespuestasController extends Controller
{
    public function index() {
        //variable para que se resalte el link del navbar
        $coloreado = true;

        //obtenemos los datos de la tabla preguntas_frecuentes
        $array_preguntas = PreguntaFrecuente::all();
        
        return view('layouts.teAseguroRespuestas', [
            'coloreado' => $coloreado,
            'array_preguntas' => $array_preguntas
        ]);
    }
}
