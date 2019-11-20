<?php

namespace App\Http\Controllers\Maestrias;

use App\DataTables\MateriasMaestriasDataTable;
use App\Http\Controllers\Controller;
use App\Models\Maestria;
use App\Models\MateriaMaestria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Materias extends Controller
{
    public function __construct()
    {
        $this->middleware(['role_or_permission:Administrador|G. Maestrías']);
    }
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
        $materiaMaestria=new MateriaMaestria();
        $materiaMaestria->maestria_id=$request->maestria;
        $materiaMaestria->nombre=$request->nombre;
        $materiaMaestria->descripcion=$request->descripcion;
        $materiaMaestria->save();
        $request->session()->flash('success','Matería creada');
        return redirect()->route('materiaMaestria',$request->maestria);
    }
    public function editarMateriaMaestria($idMateriaMaestria)
    {
        $materiaMaestria= MateriaMaestria::findOrFail($idMateriaMaestria);
        $data = array('materiaMaestria' =>$materiaMaestria , );
        return  view('maestrias.materiasMaestrias.editar',$data);
    }
    
    public function actualizarMateriaMaestria(Request $request)
    {
        $request->validate([
            'materiaMaestria'=>'required',
            'nombre' => 'required|max:255|unique:materia_maestrias,nombre,'.$request->materiaMaestria,
            'descripcion' => 'required|string|max:255',
        ]);
        $materiaMaestria= MateriaMaestria::findOrFail($request->materiaMaestria);
        $materiaMaestria->nombre=$request->nombre;
        $materiaMaestria->descripcion=$request->descripcion;
        $materiaMaestria->estado=$request->estado;
        $materiaMaestria->save();
        $request->session()->flash('success','Matería actualizada');
        return redirect()->route('materiaMaestria',$materiaMaestria->maestria_id);
    }
    public function eliminarMateriaMaestria(Request $request,$idMateriaMaestria)
    {
        try {
            DB::beginTransaction();
            $materiaMaestria=MateriaMaestria::findOrFail($idMateriaMaestria);          
            $materiaMaestria->delete();
            DB::commit();
            $request->session()->flash('success','Matería eliminada');
        } catch (\Exception $th) {
            DB::rollBack();
            $request->session()->flash('warn','Matería no puede ser eliminado');      
        }
        return redirect()->route('materiaMaestria',$materiaMaestria->maestria_id);      
    }
}
