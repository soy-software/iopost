<?php

namespace App\Http\Controllers\Inscripciones;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class Inscripciones extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    public function misInscripciones()
    {
        $inscripciones=Auth::user()->inscripciones;
        $data = array('inscripciones' => $inscripciones );
        return view('inscripciones.misInscripciones',$data);
    }
}
