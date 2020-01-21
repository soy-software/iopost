<?php

namespace App\Http\Controllers\Admisiones;

use App\Http\Controllers\Controller;
use App\Models\Admision\Admision;
use App\Models\Corte;
use App\Models\Inscripcion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;
class Examenes extends Controller
{
    public function __construct()
    {
        $this->middleware(['role_or_permission:Administrador|G. Maestrías']);
    }
    public function index($idCohorte)
    {
        $cohorte=Corte::findOrFail($idCohorte);
        $inscritos=$cohorte->inscripciones;
        $data = array('inscritos' => $inscritos,'cohorte'=>$cohorte );
        return view('admisiones.examenes.index',$data);

    }

    public function actualizarNota(Request $request)
    {
        $rg_decimal="/^[0-9,]+(\.\d{0,2})?$/";
        $request->validate([
            'inscripciones'=>'required|array',
            'inscripciones.*'=>'required|exists:inscripcions,id',
            'notas' => 'nullable|array',
            'notas.*' => 'nullable|regex:'.$rg_decimal,
        ]);

        $cohorte=Corte::findOrFail($request->cohorte);
        $this->authorize('ingresarNotaExamen',$cohorte);
        
        try {
            DB::beginTransaction();
            foreach ($request->inscripciones as $idInscripcion) {
                $inscripcion=Inscripcion::findOrFail($idInscripcion);
    
                $admision=$inscripcion->admision;
                if($admision){
                    $admision->examen=$request->notas[$inscripcion->id];
                }else{
                    $admision=new Admision();
                    $admision->inscripcion_id=$idInscripcion;
                    $admision->examen=$request->notas[$inscripcion->id];
                }
                
                $admision->save();
            }
            DB::commit();
            $request->session()->flash('success','Notas de examen actualizado');
        } catch (\Exception $th) {
            DB::rollback();
            $request->session()->flash('info','Notas no ingresado vuelva intentar');
        }
        return redirect()->route('notasExamenAdmision',$cohorte->id);
    }


    // A:deivid
    // D: descarar notas de incritos a PDF
    public function descargarNotasPdfInscritos($idCohorte)
    {
        $cohorte=Corte::findOrFail($idCohorte);
        $data = array('inscripciones' => $cohorte->inscripciones,'cohorte'=>$cohorte );
        $pdf = PDF::loadView('admisiones.examenes.notasPdf',$data)
        
        ->setOption('footer-html', view('admisiones.examenes.pie'))
        ->setOption('margin-bottom', 10);
        return $pdf->inline('Resultado_COHORTE_N_'.$cohorte->numero.'_MAESTRÍA_'.$cohorte->maestria->nombre. '.pdf');
    }

    // A: deivid
    // D: importar notas de examen de admisión por excel
    public function importarNotasExamenAdmision($idCohorte)
    {
        $cohorte=Corte::findOrFail($idCohorte);
        $this->authorize('ingresarNuevoRegistro',$cohorte);
        
        return view('admisiones.examenes.importarNotasExamenAdmision');

    }
}
