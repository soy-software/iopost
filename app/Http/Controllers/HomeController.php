<?php

namespace App\Http\Controllers;

use App\Http\Requests\Usuarios\RqActualizarDatosPerfil;
use App\Http\Requests\Usuarios\RqActualizarInfoLaboralPerfil;
use App\Http\Requests\Usuarios\RqActualizarRegAcademicosPerfi;
use App\Models\Domicilio\Provincia;
use App\Models\Usuario\InformacionLaboral;
use App\Models\Usuario\RegistroAcademico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;

class HomeController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index()
    {
        return view('home');
    }

    // A:Deivid
    // D:actualizar mi perfil
    public function miPerfil()
    {
        $usuario=Auth::user();
        $roles=Role::all();
        $provincias=Provincia::all();
        $data = array('usuario'=>$usuario,'roles' => $roles,'provincias'=>$provincias);
        return view('auth.perfil',$data);
    }

    // A:deivid
    // D:actualizar datos de mi perfil
    public function miPerfilActualizarDatos(RqActualizarDatosPerfil $request)
    {
        $user=Auth::user();
        if($request->password){
            $user->password=Hash::make($request->password);
        }

        $user->nombres=$request->nombres;
        $user->apellidos=$request->apellidos;
        $user->sexo=$request->sexo;
        $user->tipo_identificacion=$request->tipo_identificacion;
        $user->identificacion=$request->identificacion;
        $user->fecha_nacimiento=$request->fecha_nacimiento;
        $user->estado_civil=$request->estado_civil;
        $user->etnia=$request->etnia;
        $user->telefono=$request->telefono;
        $user->celular=$request->celular;
        $user->pais=$request->pais;
        $user->parroquia_id=$request->parroquia;
        $user->direccion=$request->direccion;
        $user->tiene_discapacidad=$request->tiene_discapacidad;
        $user->porcentaje_discapacidad=$request->porcentaje_discapacidad??0;
        $user->tiene_carnet_conadis=$request->tiene_carnet_conadis;
        $user->porcentaje_carnet_conadis=$request->porcentaje_carnet_conadis??0;
        
        
        $user->save();

        if ($request->hasFile('foto')) {
            if ($request->file('foto')->isValid()) {
                Storage::delete($user->foto);
                $extension = $request->foto->extension();
                $path = Storage::putFileAs(
                    'public/usuarios', $request->file('foto'), $user->id.'.'.$extension
                );
                $user->foto=$path;
                $user->save();
            }
        }

        $request->session()->flash('success','Usuario actualizado');
        
        return redirect()->route('miPerfil');
    }

    // A:deivid
    // D:actualizar mi informacion laboral
    public function actualizarInformacionLaboral(RqActualizarInfoLaboralPerfil $rq)
    {
        $user=Auth::user();
        $infoLaboral=$user->informacionLaboral;
        if(!$infoLaboral){
            $infoLaboral=new InformacionLaboral();
        }
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

        $rq->session()->flash('success','Información laboral actualizado');
        return redirect()->route('miPerfil');
    }

    public function actualizarRegistroAcademico(RqActualizarRegAcademicosPerfi $rq)
    {
        $user=Auth::user();
        $regAcademico=$user->registroAcademico;
        if(!$regAcademico){
            $regAcademico=new RegistroAcademico();
        }

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

        $rq->session()->flash('success','Registro académico actualizado');
        return redirect()->route('miPerfil');
    }


}
