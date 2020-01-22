<?php

namespace App\Imports;

use App\Models\Admision\Admision;
use App\Models\Inscripcion;
use App\User;
use Maatwebsite\Excel\Concerns\ToModel;

class NotasAdmisionImport implements ToModel
{
    
    protected $idCorte;

   public function __construct($idCohorte)
   {
       $this->idCorte=$idCohorte;
   }
    public function model(array $row)
    {
        $user=User::where('email',$row[0])->first();
        if($user){
            $inscripcion=Inscripcion::where('user_id',$user->id)->where('corte_id',$this->idCorte)->first();
            if($inscripcion){
                $admision=$inscripcion->admision;
                if($admision){
                    $admision->examen=$row[1];
                }else{
                    $admision=new Admision();
                    $admision->inscripcion_id=$inscripcion->id;
                    $admision->examen=$row[1];
                }
                $admision->save();
            }
        }
        return $user;
    }
}
