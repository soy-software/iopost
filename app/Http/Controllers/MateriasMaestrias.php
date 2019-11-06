<?php

namespace App\Http\Controllers;

use App\DataTables\MateriasMaestriasDataTable;
use App\Models\Maestria;
use App\Models\MateriaMaestria;
use Illuminate\Http\Request;

class MateriasMaestrias extends Controller
{

    public function index(MateriasMaestriasDataTable $dataTable,  $idMaestria)
    {
        $maestria=Maestria::findOrFail($idMaestria);
        $data = array('maestria' =>$maestria , );
        return  $dataTable->with('idMaestria',$maestria->id)->render('maestrias.materiasMaestrias.index',$data);
    }
    public function nuevaMateria($idMaestria)
    {
        $maestria=Maestria::findOrFail($idMaestria);
        $data = array('maestria' =>$maestria , );
        return view('maestrias.materiasMaestrias.nuevo',$data);
    }
    public function guardarMateria(Request $request)
    {
        $request->validate([
            'maestria'=>'required|exists:maestrias,id',
            'nombre' => 'required|unique:materia_maestrias|max:255',
            'descripcion' => 'required|string|max:255',
        ]);
        $maretiaMaestria=new MateriaMaestria();
        $maretiaMaestria->maestria_id=$request->maestria;
        $maretiaMaestria->nombre=$request->nombre;
        $maretiaMaestria->descripcion=$request->descripcion;
        $maretiaMaestria->save();
    }
}
