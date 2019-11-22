<?php

namespace App\Http\Controllers\Maestrias;

use App\DataTables\CortesDataTable;
use App\DataTables\InscritosCorteDataTable;
use App\Http\Controllers\Controller;
use App\Models\Corte;
use App\Models\Inscripcion;
use App\Models\Maestria;
use App\Notifications\NotificacionRegistroComprobante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
    public function guardarCortes(Request $request)
    {
        try {
            $request->validate([
                'maestria'=>'required|exists:maestrias,id',           
            ]);
            $numero=Corte::where('maestria_id',$request->maestria)->latest()->value('numero');
            if($numero){
                $numero=$numero+1;
            }else{
                $numero=1;
            }
            $maestria=Maestria::findOrFail($request->maestria);
            $this->authorize('crearCortesMaestria',$maestria);
            $corte= new Corte();
            $corte->numero=$numero;
            $corte->maestria_id=$request->maestria;
            $corte->detalle="S/D";
            $corte->usuarioCreado=Auth::id();
            $corte->save();
            return response()->json(['success'=>'Nueva corte creado exitosamente']);
        } catch (\Exception $th) {
            return response()->json(['info'=>'Ocurrio un error, vuelva intentar. Verifique que no exista un corte en estado Registro']);
        }
    }
    public function eliminarCorte(Request $request,$idCorte)
    {
        $corte=Corte::findOrFail($idCorte);
        try {
            DB::beginTransaction();
            $corte->delete();
            DB::commit();
            session()->flash('success','Corte eliminada');

        } catch (\Exception $th) {
            DB::rollBack();
            session()->flash('warn','El corte no puede ser eliminado');
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
            return response()->json(['info'=>'Corte no actualizado, ya que existe otra corte en estado Registro']);
        }else{
            $corte->estado=$request->valor;
            $corte->save();
            return response()->json(['success'=>'La corte cambio de estado a: '.$request->valor]);
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
}
