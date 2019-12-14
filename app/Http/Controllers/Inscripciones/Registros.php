<?php

namespace App\Http\Controllers\Inscripciones;

use App\DataTables\Inscripciones\RegistrosAprobarDataTable;
use App\Http\Controllers\Controller;
use App\Models\Corte;
use App\Models\Inscripcion;
use App\Models\Maestria;
use App\Notifications\NotificacionRegistroComprobante;
use Illuminate\Http\Request;

class Registros extends Controller
{
    public function __construct()
    {
        $this->middleware(['role_or_permission:Tesorero']);
    }

    public function index(RegistrosAprobarDataTable $dataTable)
    {
        return $dataTable->render('inscripciones.registro.aprobar');
    }

    public function aprobarRegistroFactura(Request $request)
    {
        $request->validate([
            'inscripcion' => 'required|exists:inscripcions,id',
            'factura' => 'required|max:255|string',
        ]);

        try {
            
            $incripcion=Inscripcion::findOrFail($request->inscripcion);
            $incripcion->numero_factura=$request->factura;
            $incripcion->estado='Aprobado';
            $incripcion->save();

            $incripcion->user->notify(new NotificacionRegistroComprobante($incripcion));
            
            return response()->json(['success'=>'Registro aprobado exitosamente con # de factura '.$request->factura.' se ha enviado informaciión a '.$incripcion->user->email]);
        } catch (\Exception $th) {
            return response()->json(['info'=>'Ocurrion un error vuelva intentar']);
        }
    }

    public function reportesDePago()
    {
        $maestrias=Maestria::all();
        $data = array('maestrias' => $maestrias );
        return view('inscripciones.registro.reportesPago',$data);
    }

    public function obtenerCohortesMaestria(Request $request)
    {
        $maestria=Maestria::findOrFail($request->maestria);
        return response()->json($maestria->cortes);
    }


    public function obtenerRegistroPorCohorte(Request $request)
    {
        $cohorte=Corte::findOrFail($request->cohorte);
        $data = array('cohorte' => $cohorte,'inscripciones'=>$cohorte->inscripciones );
        return view('inscripciones.registro.registros',$data);
    }
    
}
