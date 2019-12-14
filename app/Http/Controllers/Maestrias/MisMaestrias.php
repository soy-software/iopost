<?php

namespace App\Http\Controllers\Maestrias;

use App\DataTables\Maestrias\MisMaestrias\InscritosDataTable;
use App\Exports\InscritosExport;
use App\Http\Controllers\Controller;
use App\Models\Corte;
use App\Models\Inscripcion;
use App\Models\Maestria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class MisMaestrias extends Controller
{
    public function index()
    {
        $cortes=Auth::user()->cortes()->paginate(15);
        $data = array('cortes' => $cortes );
        return view('maestrias.misMaestrias.index',$data);
    }

    public function cortes($idMaestria)
    {
        $maestria=Maestria::findOrFail($idMaestria);
        // $this->authorize('verificarMaestria',$maestria);
        $cortes=$maestria->cortes()->paginate(15);
        $data = array('maestria' => $maestria,'cortes'=>$cortes );
        return view('maestrias.misMaestrias.cortes',$data);
    }

    public function inscritos(InscritosDataTable $dataTable, $idCorte)
    {
        $corte=Corte::findOrFail($idCorte);
        $this->authorize('verificarCorteMaestria',$corte);
        $data = array('corte' =>$corte,'inscripciones'=>$corte->inscripciones);
        return $dataTable->with('corte',$idCorte)->render('maestrias.misMaestrias.inscritos',$data);
        // return view('maestrias.misMaestrias.inscritos',$data);
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
}
