<?php

namespace App\Http\Controllers\Maestrias;

use App\Http\Controllers\Controller;
use App\Models\Maestria;
use App\User;
use Illuminate\Http\Request;

class Coordinadores extends Controller
{
    public function __construct()
    {
        $this->middleware(['role_or_permission:Administrador|G. Maestrías']);
    }

    public function index($idMaestria)
    {
        $maestria=Maestria::findOrFail($idMaestria);
        $coordinadoresSi=$maestria->coordinadores;
        $coordinadoresNo=User::whereNotIn('id',$maestria->coordinadores->pluck('id'))->role('Coordinador de maestría')->get();
        $data = array('maestria' => $maestria,'coordinadoresSi'=>$coordinadoresSi,'coordinadoresNo'=>$coordinadoresNo );
        return view('maestrias.coordinadores.index',$data);
    }

    public function sincronizar(Request $request)
    {
        $request->validate([
            'coordinador'    => 'nullable|array|min:1',
            'coordinador.*'  => 'nullable|exists:users,id',
            'maestria'=>'required|exists:maestrias,id'
        ]);

        $maestria=Maestria::findOrFail($request->maestria);
        $maestria->coordinadores()->sync($request->coordinador);
        $request->session()->flash('success','Coordinadores asignados exitosamente');
        return redirect()->route('asignarCoordinadores',$maestria->id);

    }
}
