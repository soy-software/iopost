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

class Estaticas extends Controller
{
    public function index()
    {

        $cortes=Corte::where('estado','Inscripciones')->get();
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
    // D:procesar la inscripcion del estudiante en una corte
    public function procesarInscripcion(RqProcesar $rq)
    {
        try {
            DB::beginTransaction();
            $user=User::where('email',$rq->email)->orWhere('identificacion',$rq->identificacion)->first();
            $corte=Corte::findOrFail($rq->corte);

            if($corte->estado=='Inscripciones'){
                if(!$user){
                    $user=new User();
                    $user->name=$rq->email;
                    $user->email=$rq->email;
                    $user->password=Hash::make(Str::random(15));
                    $user->nombres=$rq->nombres;
                    $user->apellidos=$rq->apellidos;
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
                    $user->assignRole('Estudiante');
                }
                $infoLaboral=$user->informacionLaboral;
                if(!$infoLaboral){
                    $infoLaboral=new InformacionLaboral();
                    $infoLaboral->trabaja=$rq->trabaja;
                    $infoLaboral->tipo_institucion=$rq->tipo_institucion;
                    $infoLaboral->nombre_empresa=$rq->nombre_empresa;
                    $infoLaboral->cargo=$rq->cargo;
                    $infoLaboral->parroquia_id=$rq->parroquia_laboral;
                    $infoLaboral->direccion=$rq->direccion_laboral;
                    $infoLaboral->telefono=$rq->telefono_laboral;
                    $infoLaboral->extencion=$rq->extencion;
                    $infoLaboral->email=$rq->email_laboral;
                    $infoLaboral->user_id=$user->id;
                    $infoLaboral->save();
                }
                
                $regAcademico=$user->registroAcademico;
                if(!$regAcademico){
                    $regAcademico=new RegistroAcademico();
    
                    $regAcademico->institucion_pregrado=$rq->institucion_pregrado;
                    $regAcademico->tipo_pregrado=$rq->tipo_pregrado;
                    $regAcademico->titulo_pregrado=$rq->titulo_pregrado;
                    $regAcademico->especialidad_pregrado=$rq->especialidad_pregrado;
                    $regAcademico->duracion_pregrado=$rq->duracion_pregrado;
                    $regAcademico->fecha_graduacion_pregrado=$rq->fecha_graduacion_pregrado;
                    $regAcademico->calificacion_grado_pregrado=$rq->calificacion_grado_pregrado;
                    $regAcademico->pais_pregrado=$rq->pais_pregrado;
                    $regAcademico->provincia_pregrado=$rq->provincia_pregrado;
                    $regAcademico->canton_pregrado=$rq->canton_pregrado;
                    
                    $regAcademico->institucion_posgrado=$rq->institucion_posgrado;
                    $regAcademico->titulo_posgrado=$rq->titulo_posgrado;
                    $regAcademico->especialidad_posgrado=$rq->especialidad_posgrado;
                    $regAcademico->duracion_posgrado=$rq->duracion_posgrado;
                    $regAcademico->fecha_graduacion_posgrado=$rq->fecha_graduacion_posgrado;
                    $regAcademico->calificacion_grado_posgrado=$rq->calificacion_grado_posgrado;
                    $regAcademico->pais_posgrado=$rq->pais_posgrado;
                    $regAcademico->provincia_posgrado=$rq->provincia_posgrado;
                    $regAcademico->canton_posgrado=$rq->canton_posgrado;
                    $regAcademico->user_id=$user->id;
                    $regAcademico->save();
                }
    
                $inscripcion=Inscripcion::where(['user_id'=>$user->id,'corte_id'=>$corte->id])->first();
                if(!$inscripcion){
                    $inscripcion=new Inscripcion();
                    $inscripcion->user_id=$user->id;
                    $inscripcion->corte_id=$corte->id;
                    $inscripcion->save();
                }
    
                $user->notify(new NotificacionInscripcion($inscripcion));
                DB::commit();
                $rq->session()->flash('success','Inscripción procesado exitosamente');
                $rq->session()->flash('inscripcionOk',$inscripcion);
                return redirect()->route('login');
            }else{
                $rq->session()->flash('error','No puede inscribir en esta corte');
            }

        } catch (\Exception $th) {
            DB::rollback();
            $rq->session()->flash('error','Ocurrio en error, por favor vuelva intentar'.$th->getMessage());
        }
        return redirect()->route('incripcion',$rq->corte)->withInput();
        
    }
}
