<?php

namespace App\Http\Controllers\Admisiones;

use App\Http\Controllers\Controller;
use App\Models\Admision\Cuestionario;
use App\Models\Corte;
use Illuminate\Http\Request;

class Cuestionarios extends Controller
{
    public function __construct()
    {
        $this->middleware(['role_or_permission:Administrador|G. Maestrías']);
    }
    public function index( $idCohorte)
    {
        $cohorte=Corte::findOrFail($idCohorte);
        $data = array('cohorte' => $cohorte,'cuestionarios'=>$cohorte->cuestionario );
        return view('admisiones.cuestionarios.index',$data);
    }

    public function guardarPreguntaCuestionario(Request $request)
    {
        $request->validate([
            'pregunta' => 'required|max:255|string',
            'cohorte' => 'required|exists:cortes,id',
        ]);
        $cohorte=Corte::findOrFail($request->cohorte);
        $this->authorize('crearCuestionario',$cohorte);
        $cuestionario=new Cuestionario();
        $cuestionario->nombre=$request->pregunta;
        $cuestionario->corte_id=$request->cohorte;
        $cuestionario->save();
        $request->session()->flash('success','Nueva pregunta ingresado');
        return redirect()->route('cuestionario',$cohorte->id);
    }

    public function eliminarCuestionario(Request $request,$idCuestionario)
    {
        $cuestionario=Cuestionario::findOrFail($idCuestionario);
        $id_cohorte=$cuestionario->cohorte->id;
        try {
            $cuestionario->delete();
            $request->session()->flash('success','Pregunta eliminado');
        } catch (\Exception $th) {
            $request->session()->flash('info','Pregunta no eliminado');
        }
        return redirect()->route('cuestionario',$id_cohorte);
    }
}
