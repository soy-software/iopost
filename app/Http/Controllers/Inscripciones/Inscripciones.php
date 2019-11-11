<?php

namespace App\Http\Controllers\Inscripciones;

use App\Http\Controllers\Controller;
use App\Models\Inscripcion;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Utilities\Request;
use PDF;
class Inscripciones extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    public function misInscripciones()
    {
        $inscripciones=Auth::user()->inscripciones;
        $data = array('inscripciones' => $inscripciones );
        return view('inscripciones.misInscripciones',$data);
    }

    public function subirComprobantePago(Request $request,$idInscripcion)
    {
        $inscripcion=Inscripcion::findOrFail($idInscripcion);
        $this->authorize('subirComprobante', $inscripcion);
        $data = array('inscripcion' => $inscripcion );
        return view('inscripciones.subirComprobantePago',$data);
    }

    public function guardarComprobantePago(Request $request)
    {
        $inscripcion=Inscripcion::findOrFail($request->inscripcion);
        $this->authorize('subirComprobante', $inscripcion);
        if ($request->hasFile('foto')) {
            if ($request->file('foto')->isValid()) {
                Storage::delete($inscripcion->comprobante);
                $extension = $request->foto->extension();
                $path = Storage::putFileAs(
                    'public/comprobantes', $request->file('foto'), $inscripcion->id.'.'.$extension
                );
                $inscripcion->comprobante=$path;
                $inscripcion->save();
            }
        }
        $request->session()->flash('success','Comprobante subido exitosamente');
        return redirect()->route('misInscripciones');
    }


    public function verMiInscripcion($idInscripcion)
    {
        $inscripcion=Inscripcion::findOrFail($idInscripcion);
        $data = array('inscripcion' => $inscripcion );
        return view('inscripciones.verMiInscripcion',$data);
    }

    public function inscripcionPdf($idInscripcion)
    {
        $inscripcion=Inscripcion::findOrFail($idInscripcion);
        $data = array('inscripcion' => $inscripcion );
        $pdf = PDF::loadView('inscripciones.inscripcionPdf', $data);
        return $pdf->download('inscripcion.pdf');
    }
}
