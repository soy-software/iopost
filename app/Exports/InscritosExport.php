<?php

namespace App\Exports;

use App\Models\Corte;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class InscritosExport implements FromView
{
    protected $idCorte;

    public function __construct($corte)
    {
        $this->idCorte=$corte;
    }

    public function view(): View
    {
        $corte_m=Corte::findOrFail($this->idCorte);
        return view('maestrias.misMaestrias.aspirantes',[
            'inscripciones'=>$corte_m->inscripciones
        ]);
    }
}
