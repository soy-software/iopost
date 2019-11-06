<?php

namespace App\Http\Controllers\Inscripciones;

use App\Http\Controllers\Controller;
use App\Models\Corte;
use Illuminate\Http\Request;

class Inscripciones extends Controller
{
    public function index($idCorte)
    {
        $corte=Corte::findOrFail($idCorte);
        $data = array('corte' => $corte );
        return view('inscripciones.index',$data);
    }
}
