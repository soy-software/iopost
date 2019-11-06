<?php

namespace App\Http\Controllers;

use App\Models\Corte;
use App\Models\Domicilio\Canton;
use App\Models\Domicilio\Provincia;
use Illuminate\Http\Request;

class Estaticas extends Controller
{
    public function index()
    {
        $cortes=Corte::where('estado','Inscripciones')->get();
        $data = array('cortes' => $cortes );
        return view('welcome',$data);
    }

    // A:Deivid
    // D: obtener cantones por provinvia 
    public function obtenerCantonesXprovincia(Request $request)
    {
        $provincia=Provincia::findOrFail($request->id);
        return response()->json($provincia->cantones);
    }


    // A:Deivid
    // D: obtener parroquias por canton 
    public function obtenerParroquiasXcanton(Request $request)
    {
        $canton=Canton::findOrFail($request->id);
        return response()->json($canton->parroquias);
    }
}
