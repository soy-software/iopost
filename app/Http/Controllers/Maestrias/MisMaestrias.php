<?php

namespace App\Http\Controllers\Maestrias;

use App\DataTables\Maestrias\MisMaestrias\InscritosDataTable;
use App\Exports\InscritosExport;
use App\Http\Controllers\Controller;
use App\Models\Admision\Admision;
use App\Models\Admision\Pregunta;
use App\Models\Corte;
use App\Models\Inscripcion;
use App\Models\Maestria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class MisMaestrias extends Controller
{
    public function index()
    {
        $this->authorize('accederMisMaestrias',Maestria::class);
        $cortes=Auth::user()->cortes()->paginate(15);
        $data = array('cortes' => $cortes );
        return view('maestrias.misMaestrias.index',$data);
    }

    // public function cortes($idMaestria)
    // {
    //     $maestria=Maestria::findOrFail($idMaestria);
    //     $this->authorize('verificarMaestria',$maestria);
    //     $cortes=$maestria->cortes()->paginate(15);
    //     $data = array('maestria' => $maestria,'cortes'=>$cortes );
    //     return view('maestrias.misMaestrias.cortes',$data);
    // }

    public function inscritos(InscritosDataTable $dataTable, $idCorte)
    {
        $corte=Corte::findOrFail($idCorte);
        $this->authorize('verificarCorteMaestria',$corte);
        $data = array('corte' =>$corte,'inscripciones'=>$corte->inscripciones);
        return $dataTable->with('corte',$idCorte)->render('maestrias.misMaestrias.inscritos',$data);
        
    }
    

    // A:deivid
    // D: descargar inscritos a excel 
    public function descargarExcelinscritos( Request $request, $idCorte,$opcion)
    {
        $request->merge(['opcion'=>$opcion,'cohorte'=>$idCorte]);
        $request->validate([
            'cohorte'=>'required|exists:cortes,id',
            'opcion' => 'in:Todos,Registro,Subir comprobante de registro,Aprobado,Inscrito'
        ]);

        $corte=Corte::findOrFail($idCorte);
        $this->authorize('verificarCorteMaestria',$corte);     
        return Excel::download(new InscritosExport($idCorte,$opcion),'inscritos en corte '.$corte->numero .'.xlsx');
    }

    public function informacionAspirante($idInscripcion)
    {
        $inscripcion=Inscripcion::findOrFail($idInscripcion);
        $this->authorize('verificarCorteMaestria',$inscripcion->corte);
        $data = array('inscripcion' => $inscripcion );
        return view('maestrias.misMaestrias.infoAspirante',$data);
    }


    // A:deivid
    // D:acceso las notas de admision del estudiante
    public function notasAdmisionAspirante($idInscripcion)
    {
        $inscripcion=Inscripcion::findOrFail($idInscripcion);
        $this->authorize('verificarCorteMaestria',$inscripcion->corte);
        $cuestionario=$inscripcion->corte->cuestionario;
        $admision=$inscripcion->admision;
        if(!$admision){
            $admision=new Admision();
            $admision->inscripcion_id=$inscripcion->id;
            $admision->save();
        }
        $admision->cuestionarios()->sync($cuestionario->pluck('id'));
        $data = array(
            'inscripcion'=>$inscripcion,
            'cuestionarios' =>$admision->cuestionarios,
            'admision'=>$admision
        );
        return view('maestrias.misMaestrias.notasAdmisionAspirante',$data);
    }

    public function guardarNotasAdmisionAspirante(Request $request)
    {
        $request->validate([
            'inscripcion'=>'required|exists:inscripcions,id',
            'preguntas' => 'required|array',
            'preguntas.*' => 'required|exists:preguntas,id',
            'opcion'=>'required|array',
            'opcion.*'=>'required|in:Excelente,Muy bueno,Bueno,Regular,Pobre'
        ]);

        $inscripcion=Inscripcion::findOrFail($request->inscripcion);
        $this->authorize('verificarCorteMaestria',$inscripcion->corte);

        try {
            DB::beginTransaction();
            $inscripcion->admision->entrevista=0;
            $inscripcion->admision->save();
            foreach ($request->preguntas as $idPregunta) {
                $pregunta=Pregunta::findOrFail($idPregunta);
                $pregunta->opcion=$request->opcion[$idPregunta];
                
                switch ($request->opcion[$idPregunta]) {
                    case 'Excelente':
                        $pregunta->nota=3;
                        break;
                    case 'Muy bueno':
                        $pregunta->nota=2;
                        break;
                    case 'Bueno':
                        $pregunta->nota=1.50;
                        break;
                    case 'Regular':
                        $pregunta->nota=1;
                        break;
                    case 'Pobre':
                        $pregunta->nota=0.50;
                        break;
                }

                $pregunta->save();
                $pregunta->admision->entrevista=$pregunta->admision->entrevista+$pregunta->nota;
                $pregunta->admision->save();
            }
            $request->session()->flash('success','Entrevista guardado exitosamente');
            DB::commit();
        } catch (\Exception $th) {
            $request->session()->flash('info','Entrevista no guardado, vuelva intentar');
            DB::rollback();
        }

        return redirect()->route('notasAdmisionAspirante',$inscripcion->id);
    }

    // A:deivid
    // D:actualizar nota de ensayo de aspirante
    public function guardarNotasEnsayoAspirante(Request $request)
    {
        $rg_decimal="/^[0-9,]+(\.\d{0,2})?$/";
        $request->validate([
            'inscripcion'=>'required|exists:inscripcions,id',
            'nota' => 'required|regex:'.$rg_decimal
        ]);

        $inscripcion=Inscripcion::findOrFail($request->inscripcion);
        $this->authorize('verificarCorteMaestria',$inscripcion->corte);        
        $inscripcion->admision->ensayo=$request->nota;
        $inscripcion->admision->save();
        $request->session()->flash('success','Nota de ensayo guardado exitosamente');
        return redirect()->route('notasAdmisionAspirante',$inscripcion->id);
    }
}
