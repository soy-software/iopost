<?php

namespace App\Exports;

use App\Models\Corte;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class InscritosExport implements FromView
{
    protected $idCorte;
    protected $opcion;

    public function __construct($corte,$op)
    {
        $this->idCorte=$corte;
        $this->opcion=$op;
    }

    public function view(): View
    {
        $corte_m=Corte::findOrFail($this->idCorte);
        if($this->opcion=='Todos'){
            $corte_m=$corte_m->inscripciones;
        }else{
            $corte_m=$corte_m->inscripciones->where('estado',$this->opcion);
        }
        return view('maestrias.misMaestrias.aspirantes',[
            'inscripciones'=>$corte_m
        ]);
    }
}
