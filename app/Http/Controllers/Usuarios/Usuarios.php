<?php

namespace App\Http\Controllers\Usuarios;

use App\Canton;
use App\DataTables\Usuarios\UsuariosDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Usuarios\RqGuardar;
use App\Provincias;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;

class Usuarios extends Controller
{
    public function __construct()
    {
        $this->middleware(['role_or_permission:Administrador|Usuarios']);
    }
    public function index(UsuariosDataTable $dataTable)
    {
        return $dataTable->render('usuarios.usuarios.index');
    }

    public function nuevo()
    {
        $roles=Role::all();
        $provincias=Provincias::all();
        $data = array('roles' => $roles,'provincias'=>$provincias);
        return view('usuarios.usuarios.nuevo',$data);
    }

    // A:Deivid
    // D: obtener cantones por provinvia 
    public function obtenerCantonesXprovincia(Request $request)
    {
        $provincia=Provincias::findOrFail($request->id);
        return response()->json($provincia->cantones);
    }


    // A:Deivid
    // D: obtener parroquias por canton 
    public function obtenerParroquiasXcanton(Request $request)
    {
        $canton=Canton::findOrFail($request->id);
        return response()->json($canton->parroquias);
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
        $user->provincia=$request->provincia;
        $user->canton=$request->canton;
        $user->parroquia=$request->parroquia;
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
    
}
