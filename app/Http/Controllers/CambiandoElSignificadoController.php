<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CambiandoElSignificadoController extends Controller
{
    public function index() {
        return view('layouts.cambiandoElSignificado', [
        ]);
    }
}
