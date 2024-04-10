<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeAseguroRespuestasController extends Controller
{
    public function index() {
        //variable para que se resalte el link del navbar
        $coloreado = true;

        
        return view('layouts.teAseguroRespuestas', [
            'coloreado' => $coloreado
        ]);
    }
}
