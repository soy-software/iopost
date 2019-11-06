<?php

namespace App\Http\Controllers;

use App\Models\Corte;
use Illuminate\Http\Request;

class Estaticas extends Controller
{
    public function index()
    {
        $cortes=Corte::where('estado','Inscripciones')->get();
        $data = array('cortes' => $cortes );
        return view('welcome',$data);
    }
}
