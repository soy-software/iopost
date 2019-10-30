<?php

namespace App\Http\Controllers;

use App\DataTables\MaestriasDataTable;
use App\Models\Maestria;
use Illuminate\Http\Request;


class Maestrias extends Controller
{
    public function index(MaestriasDataTable $dataTable)
    {
        return  $dataTable->render('maestrias.index') ;
    }

    public function nuevo()
    {
        return view('maestrias.nuevo');
    }
    public function guardarMaestria(Request $request)
    {
        $maestria=new Maestria();
        $maestria->nombre=$request->nombre;
        $maestria->tipoPrograma=$request->tipoPrograma;
        $maestria->campoAmplio=$request->campoAmplio;
        $maestria->campoEspecifico=$request->campoEspecifico;
        $maestria->campoDetallado=$request->campoDetallado;            
        $maestria->programa=$request->programa;
        $maestria->titulo=$request->titulo;
        $maestria->codificacionPrograma=$request->codificacionPrograma;
        $maestria->lugarEjecucion=$request->lugarEjecucion;
        $maestria->duracion=$request->duracion;
        $maestria->tipoPeriodo=$request->tipoPeriodo;
        $maestria->numeroHoras=$request->numeroHoras;
        $maestria->resolucion=$request->resolucion;
        $maestria->fechaResolucion=$request->fechaResolucion;            
        $maestria->modalidad=$request->modalidad;
        $maestria->paralelos=$request->paralelos;
        $maestria->vigencia=$request->vigencia;
        $maestria->fechaAprobacion=$request->fechaAprobacion;
        $maestria->capacidadParalelo=$request->capacidadParalelo;
        $maestria->save();
    }
}
