<?php

namespace App\Http\Controllers\Inscripciones;

use App\Http\Controllers\Controller;
use App\Models\Corte;
use App\Models\Domicilio\Provincia;
use Illuminate\Http\Request;

class Inscripciones extends Controller
{
    public function index($idCorte)
    {
        $corte=Corte::findOrFail($idCorte);
        $provincias=Provincia::all();
        $data = array('corte' => $corte,'provincias'=>$provincias );
        return view('inscripciones.index',$data);
    }
}
