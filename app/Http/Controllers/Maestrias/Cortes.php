<?php

namespace App\Http\Controllers\Maestrias;

use App\DataTables\CortesDataTable;
use App\DataTables\InscritosCorteDataTable;
use App\Http\Controllers\Controller;
use App\Models\Corte;
use App\Models\Inscripcion;
use App\Models\Maestria;
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
        $request->validate([
            'maestria'=>'required|exists:maestrias,id',           
        ]);
        $numero=Corte::where('maestria_id',$request->maestria)->latest()->value('numero');
        if($numero){
            $numero=$numero+1;
        }else{
            $numero=1;
        }
        $corte= new Corte();
        $corte->numero=$numero;
        $corte->maestria_id=$request->maestria;
        $corte->detalle="S/D";
        $corte->usuarioCreado=Auth::id();
        $corte->save();
        $request->session()->flash('success','Corte creado');
        return redirect()->route('cortesMaestria',$request->maestria);
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
        $corte=Corte::findOrFail($request->corte);
        
        $validacion=$this->validacionCorte($corte->id,$request->valor);
        if($validacion=="ok"){
            $corte->estado=$request->valor;
            $corte->save();
            session()->flash('success','La corte cambio de estado a: '.$request->valor);   
        }else{
            session()->flash('warn',$validacion);
        }
        
    }
    public function validacionCorte($corte,$estado)
    {
        $corte=Corte::findOrFail($corte);
        $mensage="";
        $cortetodos=Corte::where('estado','Inscripciones')
                    ->where('maestria_id',$corte->maestria_id)
                    ->where('id','!=',$corte->id)->count();
        if($estado=="Inscripciones"){
            if($cortetodos==0){
                $mensage="ok";
            }else{
                $mensage="Estado de la corte no actualizada, ya que existe un corte en estado de Inscripción";
            }
        }else{
            $mensage="ok";
        }
        return $mensage;
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
}
