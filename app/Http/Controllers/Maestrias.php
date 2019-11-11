<?php

namespace App\Http\Controllers;

use App\DataTables\MaestriasDataTable;
use App\Http\Requests\Maestrias\RqCrear;
use App\Http\Requests\Maestrias\RqEditar;
use App\Models\Maestria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class Maestrias extends Controller
{
    public function __construct()
    {
        $this->middleware(['role_or_permission:Administrador|G. Maestrias']);
    }

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
        $maestria->descripcionGeneral=$request->descripcionGeneral;
        $maestria->usuarioCreado=Auth::id();
        $maestria->valorMatricula=$request->valorMatricula;
        $maestria->save();
        if ($request->hasFile('foto')) {
            if ($request->file('foto')->isValid()) {
                $extension = $request->foto->extension();
                $path = Storage::putFileAs(
                    'public/maestrias', $request->file('foto'), $maestria->id.'.'.$extension
                );
                $maestria->foto=$path;
                $maestria->save();
            }
        }
        $request->session()->flash('success','Maestria creada');
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
        $maestria->descripcionGeneral=$request->descripcionGeneral;
        $maestria->usuarioActualizado=Auth::id();        
        $maestria->valorMatricula=$request->valorMatricula;
        $maestria->save();
        if ($request->hasFile('foto')) {
            if ($request->file('foto')->isValid()) {
                Storage::delete($maestria->foto);
                $extension = $request->foto->extension();
                $path = Storage::putFileAs(
                    'public/maestrias', $request->file('foto'), $maestria->id.'.'.$extension
                );
                $maestria->foto=$path;
                $maestria->save();
            }
        }
        $request->session()->flash('success','Maestria actualizada');
        return redirect()->route('maestrias');
    }
    public function informacionMaestria($idMaestria)
    {
        $maestria=Maestria::findOrFail($idMaestria);
        $data = array('maestria' =>$maestria);
        return view('maestrias.informacion',$data);
    }
    
    public function eliminarMaestria(Request $request,$idMaestria)
    {
        try {
            DB::beginTransaction();
            $maestria=Maestria::findOrFail($idMaestria);
            if ($maestria->foto) {              
                Storage::delete($maestria->foto);               
            }
            $maestria->delete();
            DB::commit();
            $request->session()->flash('success','Maestria eliminada');
        } catch (\Exception $th) {
            DB::rollBack();
            $request->session()->flash('warn','La maestria no puede ser eliminado');      
        }
        return redirect()->route('maestrias');      
    }

}
