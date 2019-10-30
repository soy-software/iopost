<?php

namespace App\Http\Controllers;

use App\DataTables\MaestriasDataTable;
use App\Http\Requests\Maestrias\RqCrear;
use App\Http\Requests\Maestrias\RqEditar;
use App\Models\Maestria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function guardarMaestria(RqCrear $request)
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
        $maestria->usuarioCreado=Auth::id();
        $maestria->save();
        return redirect()->route('maestrias');
    }
    public function editarMaestria($idMaestria)
    {
        $maestria=Maestria::findOrFail($idMaestria);
        $data = array('maestria' =>$maestria);
        return view('maestrias.editar',$data);
    }
    public function actualizarMaestria(RqEditar $request)
    {
        $maestria=Maestria::findOrFail($request->maestria);
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
        $maestria->usuarioActualizado=Auth::id();        
        $maestria->save();
        return redirect()->route('maestrias');
    }
    public function informacionMaestria($idMaestria)
    {
        $maestria=Maestria::findOrFail($idMaestria);
        $data = array('maestria' =>$maestria);
        return view('maestrias.informacion',$data);
    }
    
}
