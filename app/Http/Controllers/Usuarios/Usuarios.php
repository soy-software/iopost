<?php

namespace App\Http\Controllers\Usuarios;

use App\DataTables\Usuarios\UsuariosDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Usuarios\RqActualizarInformacionLaboral;
use App\Http\Requests\Usuarios\RqActualizarRegistroAcademico;
use App\Http\Requests\Usuarios\RqEditar;
use App\Http\Requests\Usuarios\RqGuardar;
use App\Models\Domicilio\Canton;
use App\Models\Domicilio\Provincia;
use App\Models\Usuario\InformacionLaboral;
use App\Models\Usuario\RegistroAcademico;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;

class Usuarios extends Controller
{
    public function __construct()
    {
        $this->middleware(['role_or_permission:Administrador|G. Usuarios']);
    }

    public function index(UsuariosDataTable $dataTable,$rol=null)
    {
        $roles=Role::all();
        $data = array('roles' =>$roles );
        return $dataTable->with('rol',$rol)->render('usuarios.usuarios.index',$data);
        
        
    }

    public function nuevo()
    {
        $roles=Role::all();
        $provincias=Provincia::all();
        $data = array('roles' => $roles,'provincias'=>$provincias);
        return view('usuarios.usuarios.nuevo',$data);
    }

    


    // A:Deivid
    // D: guardar nuevo usuario
    public function guardar(RqGuardar $request)
    {
        $user=new User();
        $user->email=$request->email;
        $user->name=$request->email;
        $user->password=Hash::make($request->password);
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
                $extension = $request->foto->extension();
                $path = Storage::putFileAs(
                    'public/usuarios', $request->file('foto'), $user->id.'.'.$extension
                );
                $user->foto=$path;
                $user->save();
            }
        }

        $user->assignRole($request->roles);

        $request->session()->flash('success','Nuevo usuario ingresado');
        
        return redirect()->route('usuarios');
    }
    public function informacionUsuario($idUsuario)
    {
        $usuario=User::findOrFail($idUsuario);
        $data = array('usuario'=>$usuario);
        return view('usuarios.usuarios.informacion',$data);
    }
    
    public function editarUsuario($idUsuario)
    {
        $usuario=User::findOrFail($idUsuario);
        $this->authorize('editar', $usuario);
        $roles=Role::all();
        $provincias=Provincia::all();
        $data = array('usuario'=>$usuario,'roles' => $roles,'provincias'=>$provincias);
        return view('usuarios.usuarios.editar',$data);
    }

    public function actualizar(RqEditar $request)
    {
        $user=User::findOrFail($request->usuario);
        $this->authorize('editar', $user);
        $user->email=$request->email;
        $user->name=$request->email;
        
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
        $user->estado=$request->estado;
        
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
        $user->syncRoles($request->roles);
        $request->session()->flash('success','Usuario actualizado');
        
        return redirect()->route('usuarios');

    }


    public function actualizarInformacionLaboral(RqActualizarInformacionLaboral $rq)
    {
        $user=User::findOrFail($rq->usuario);
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
        return redirect()->route('usuarios');
    }

    public function actualizarRegistroAcademico(RqActualizarRegistroAcademico $rq)
    {
        $user=User::findOrFail($rq->usuario);
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
        return redirect()->route('usuarios');
    }

    public function eliminar(Request $request, $idUsuario)
    {

        $user=User::findOrFail($idUsuario);
        $this->authorize('eliminar', $user);
        $user->delete();
        $request->session()->flash('success','Usuario eliminado');
        return redirect()->route('usuarios');
    }
}
