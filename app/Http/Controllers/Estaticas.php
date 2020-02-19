<?php

namespace App\Http\Controllers;

use App\Http\Requests\Inscripciones\RqProcesar;
use App\Models\Corte;
use App\Models\Domicilio\Canton;
use App\Models\Domicilio\Provincia;
use App\Models\Inscripcion;
use App\Models\Usuario\InformacionLaboral;
use App\Models\Usuario\RegistroAcademico;
use App\Notifications\NotificacionInscripcion;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Artisan;
use PDF;
class Estaticas extends Controller
{
    public function index()
    {

        $cortes=Corte::where('estado','Registro')->get();
        $data = array('cortes' => $cortes );
        return view('welcome',$data);

        // Artisan::call('cache:clear');
        // Artisan::call('config:clear');
        // Artisan::call('config:cache');
        // Artisan::call('storage:link');
        // Artisan::call('key:generate');
        // Artisan::call('migrate:fresh --seed');
    }

    // A:Deivid
    // D: obtener cantones por provinvia
    public function obtenerCantonesXprovincia(Request $request)
    {
        $provincia=Provincia::findOrFail($request->id);
        return response()->json($provincia->cantones);
    }


    // A:Deivid
    // D: obtener parroquias por canton
    public function obtenerParroquiasXcanton(Request $request)
    {
        $canton=Canton::findOrFail($request->id);
        return response()->json($canton->parroquias);
    }

    // A:deivid
    // D: vista de inscripcione en linea
    public function inscripcion($idCorte)
    {
        $corte=Corte::findOrFail($idCorte);
        $provincias=Provincia::all();
        $data = array('corte' => $corte,'provincias'=>$provincias );
        return view('inscripciones.index',$data);
    }

    // A:deivid
    // D:procesar la inscripcion del estudiante en una corte, esto tambien esta en corte nuevo registro
    public function procesarInscripcion(RqProcesar $rq)
    {
        try {
            DB::beginTransaction();
            $user=User::where('email',$rq->email)->orWhere('identificacion',$rq->identificacion)->first();
            $corte=Corte::findOrFail($rq->corte);

            if($corte->estado=='Registro'){
                $pass='La contraseña, sigue siendo la misma.';

                if(!$user){
                    $user=new User();
                    $user->name=$rq->email;
                    $user->email=$rq->email;
                    $pass=Str::random(15);
                    $user->password=Hash::make($pass);
                    $user->primer_nombre=$rq->primer_nombre;
                    $user->segundo_nombre=$rq->segundo_nombre;
                    $user->primer_apellido=$rq->primer_apellido;
                    $user->segundo_apellido=$rq->segundo_apellido;
                    $user->sexo=$rq->sexo;
                    $user->tipo_identificacion=$rq->tipo_identificacion;
                    $user->identificacion=$rq->identificacion;
                    $user->fecha_nacimiento=$rq->fecha_nacimiento;
                    $user->estado_civil=$rq->estado_civil;
                    $user->etnia=$rq->etnia;
                    $user->telefono=$rq->telefono;
                    $user->celular=$rq->celular;
                    $user->pais=$rq->pais;
                    $user->parroquia_id=$rq->parroquia;
                    $user->direccion=$rq->direccion;
                    $user->save();
                    $user->assignRole('Aspirante');
                }

                $inscripcion=Inscripcion::where(['user_id'=>$user->id,'corte_id'=>$corte->id])->first();
                if(!$inscripcion){
                    $inscripcion=new Inscripcion();
                    $inscripcion->user_id=$user->id;
                    $inscripcion->corte_id=$corte->id;
                    $inscripcion->valorMatricula=$corte->valorRegistro;
                    $inscripcion->save();
                }

                $user->notify(new NotificacionInscripcion($inscripcion,$pass));
                DB::commit();
                $rq->session()->flash('success','Inscripción procesado exitosamente');
                $rq->session()->flash('inscripcionOk',$inscripcion);
            }else{
                $rq->session()->flash('error','No puede inscribir en esta corte');
            }

        } catch (\Exception $th) {
            DB::rollback();
            $rq->session()->flash('error','Ocurrio en error, por favor vuelva intentar');
            return redirect()->route('incripcion',$rq->corte)->withInput();
        }
        return redirect()->route('incripcion',$rq->corte);

    }


    // A:deivid
    // D:descargar pdf registro de maestria
    public function descargarRegistroPdf($idInscripcion)
    {
        $inscripcion=Inscripcion::findOrFail($idInscripcion);
        $data = array('inscripcion' => $inscripcion );
        return view('inscripciones.documentoRegistroPdf',$data);
    }
    public function verRegistroPdf($idInscripcion)
    {
        $inscripcion=Inscripcion::findOrFail($idInscripcion);
        $data = array('inscripcion' => $inscripcion );
        $pdf = PDF::loadView('inscripciones.inscripcionPdf', $data);
        return $pdf->inline('Registro de maestría '.$inscripcion->id.'.pdf');
    }
}
