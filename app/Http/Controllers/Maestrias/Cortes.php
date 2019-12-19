<?php

namespace App\Http\Controllers\Maestrias;

use App\DataTables\CortesDataTable;
use App\DataTables\InscritosCorteDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Maestrias\Cortes\RqActualizar;
use App\Http\Requests\Maestrias\Cortes\RqCrear;
use App\Models\Corte;
use App\Models\Inscripcion;
use App\Models\Maestria;
use App\Notifications\NotificacionRegistroComprobante;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PDF;
class Cortes extends Controller
{
    public function __construct()
    {
        $this->middleware(['role_or_permission:Administrador|G. Maestrías']);
    }

    public function index(CortesDataTable $dataTable,  $idMaestria)
    {
        $maestria=Maestria::findOrFail($idMaestria);
        $data = array('maestria' =>$maestria , );
        return  $dataTable->with('idMaestria',$maestria->id)->render('maestrias.cortes.index',$data);
    }

    public function nuevo($idMaestria)
    {
        $maestria=Maestria::findOrFail($idMaestria);

        $numero=Corte::where('maestria_id',$idMaestria)->latest()->value('numero');
        if($numero){
            $numero=$numero+1;
        }else{
            $numero=1;
        }

        $coordinadores=User::role('Coordinador de maestría')->get();
        
        $data = array(
            'maestria' => $maestria,
            'numero'=>$numero,
            'coordinadores'=>$coordinadores
        );
        
        return view('maestrias.cortes.nuevo',$data);
    }

    public function guardar(RqCrear $request)
    {
        $maestria=Maestria::findOrFail($request->maestria);
        try {
            DB::beginTransaction();
            $numero=Corte::where('maestria_id',$request->maestria)->latest()->value('numero');
            if($numero){
                $numero=$numero+1;
            }else{
                $numero=1;
            }
            $this->authorize('crearCortesMaestria',$maestria);
            $corte=new Corte();
            $corte->numero=$numero;
            $corte->valorRegistro=$request->valorRegistro;
            $corte->valorMatricula=$request->valorMatricula;
            $corte->valorColegiatura=$request->valorColegiatura;
            $corte->fechaInicioDocumentos=$request->fechaInicioDocumentos;
            $corte->fechaFinDocumentos=$request->fechaFinDocumentos;
            $corte->fechaAdmision=$request->fechaAdmision;
            $corte->horaAdmision=$request->horaAdmision;
            $corte->entrevistaEnsayo=$request->entrevistaEnsayo;
            $corte->presentacionInformes=$request->presentacionInformes;
            $corte->resolucionProcesoAdmitidos=$request->resolucionProcesoAdmitidos;
            $corte->publicacionAdmitidos=$request->publicacionAdmitidos;
            $corte->inicioClases=$request->inicioClases;
            $corte->fechaInicioMatricula=$request->fechaInicioMatricula;
            $corte->fechaFinMatricula=$request->fechaFinMatricula;
            $corte->maestria_id=$maestria->id;
            $corte->usuarioCreado=Auth::id();
            $corte->save();

            $corte->coordinadores()->sync($request->coordinadores);
            

            DB::commit();

            $request->session()->flash('success','Nueva cohorte creado');
        } catch (\Exception $th) {
            DB::rollback();
            $request->session()->flash('info','Cohorte no creado, por favor vuelva intentar');
        }
        return redirect()->route('cortesMaestria',$maestria->id);
    }

    public function editar($idCorte)
    {
        $corte=Corte::findOrFail($idCorte);
        $coordinadores=User::role('Coordinador de maestría')->get();
        $data = array('corte'=>$corte,'coordinadores'=>$coordinadores);
        return view('maestrias.cortes.editar',$data);
    }

    public function actualizar(RqActualizar $request) 
    {
        $corte=Corte::findOrFail($request->corte);
        try {
            DB::beginTransaction();
            $corte->valorRegistro=$request->valorRegistro;
            $corte->valorMatricula=$request->valorMatricula;
            $corte->valorColegiatura=$request->valorColegiatura;
            $corte->fechaInicioDocumentos=$request->fechaInicioDocumentos;
            $corte->fechaFinDocumentos=$request->fechaFinDocumentos;
            $corte->fechaAdmision=$request->fechaAdmision;
            $corte->horaAdmision=$request->horaAdmision;
            $corte->entrevistaEnsayo=$request->entrevistaEnsayo;
            $corte->presentacionInformes=$request->presentacionInformes;
            $corte->resolucionProcesoAdmitidos=$request->resolucionProcesoAdmitidos;
            $corte->publicacionAdmitidos=$request->publicacionAdmitidos;
            $corte->inicioClases=$request->inicioClases;
            $corte->fechaInicioMatricula=$request->fechaInicioMatricula;
            $corte->fechaFinMatricula=$request->fechaFinMatricula;
            $corte->usuarioActualizado=Auth::id();
            $corte->save();
            
            $corte->coordinadores()->sync($request->coordinadores);
            
            DB::commit();
            $request->session()->flash('success','Cohorte actualizado');
        } catch (\Exception $th) {
            DB::rollback();
            $request->session()->flash('success','Cohorte no actualizado, vuelva intentar');
        }
        return redirect()->route('cortesMaestria',$corte->maestria->id);
    }
    public function eliminarCorte(Request $request,$idCorte)
    {
        $corte=Corte::findOrFail($idCorte);
        try {
            DB::beginTransaction();
            $corte->delete();
            DB::commit();
            session()->flash('success','Cohorte eliminada');

        } catch (\Exception $th) {
            DB::rollBack();
            session()->flash('warn','Cohorte no puede ser eliminado');
        }
        return redirect()->route('cortesMaestria',$corte->maestria_id);
    }
    public function cambiarEstadoCorte(Request $request)
    {
        $request->validate([
            'corte' => 'required|exists:cortes,id',
            'valor' => 'required|in:Promoción,Registro,Proceso académico,Finalizado',
        ]);

        $corte=Corte::findOrFail($request->corte);

        $cortetodos=Corte::where('estado','Registro')
            ->where('maestria_id',$corte->maestria_id)
            ->where('id','!=',$corte->id)->count();
        if($cortetodos>0){
            return response()->json(['info'=>'Cohorte no actualizado, ya que existe otra Cohorte en estado Registro']);
        }else{
            $corte->estado=$request->valor;
            $corte->save();
            return response()->json(['success'=>'Cohorte cambio de estado a: '.$request->valor]);
        }
        
    }
    
    public function inscritosCorte(InscritosCorteDataTable $dataTable,  $idCorte)
    {
        $corte=Corte::findOrFail($idCorte);
        $data = array('corte' =>$corte , );
        return  $dataTable->with('idCorte',$corte->id)->render('maestrias.cortes.inscritos',$data);
    }
    public function informacionInscritoCorte($idInscripcion)
    {
        $inscripciones=Inscripcion::findOrFail($idInscripcion);
        $data = array('inscripcion' => $inscripciones );
        return view('maestrias.cortes.informacionInscrito',$data);
    }


    public function cambiarEstadoInscripcion(Request $request)
    {
        $request->validate([
            'inscripcion' => 'required|exists:inscripcions,id',
            'estado' => 'required|in:Registro,Subir comprobante de registro,Aprobado,Inscrito',
        ]);
        $inscripcion=Inscripcion::findOrFail($request->inscripcion);
        if($request->estado=='Aprobado'){
            $inscripcion->user->notify(new NotificacionRegistroComprobante($inscripcion));
        }
        $inscripcion->estado=$request->estado;

        $inscripcion->save();
        return response()->json(['success'=>'Estado del registro cambiado exitosamente']);
    }


    // A:deivid
    // D: ver notas de admision de estudiante
    public function verAdmisionEstudiante($idInscripcion)
    {
        $inscripcion=Inscripcion::findOrFail($idInscripcion);
        $cohorte=$inscripcion->corte;
        $data = array(
            'cohorte'=>$inscripcion->corte,
            'inscripciones' => $inscripcion);
            $pdf = PDF::loadView('maestrias.cortes.verAdmisionEstudiante',$data)
        
        ->setOption('footer-html', view('admisiones.examenes.pie'))
        ->setOption('margin-bottom', 10);
        return $pdf->inline('Resultado_COHORTE_N_'.$cohorte->numero.'_MAESTRÍA_'.$cohorte->maestria->nombre. '.pdf');
        
        
    }
}
