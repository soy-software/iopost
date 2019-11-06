<?php

namespace App\Http\Controllers;

use App\DataTables\CortesDataTable;
use App\Models\Corte;
use App\Models\Maestria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class Cortes extends Controller
{
    public function index(CortesDataTable $dataTable,  $idMaestria)
    {
        $maestria=Maestria::findOrFail($idMaestria);
        $data = array('maestria' =>$maestria , );
        return  $dataTable->with('idMaestria',$maestria->id)->render('maestrias.cortes.index',$data);
    }
    public function guardarCortes(Request $request)
    {
        $numero=Corte::latest()->value('numero');
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
       try {
            DB::beginTransaction();
            $corte=Corte::findOrFail($idCorte);
            $corte->delete();
            DB::commit();
            $request->session()->flash('success','Corte eliminada');
            return redirect()->route('cortesMaestria',$corte->maestria_id);

        } catch (\Exception $th) {
            DB::rollBack();
            $request->session()->flash('warn','El corte no puede ser eliminado');
            return redirect()->route('cortesMaestria',$corte->maestria_id);
            
        }
    }
}
