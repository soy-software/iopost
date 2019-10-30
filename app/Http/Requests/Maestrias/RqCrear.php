<?php

namespace App\Http\Requests\Maestrias;

use Illuminate\Foundation\Http\FormRequest;

class RqCrear extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nombre'=>'required|string|max:255',
            'tipoPrograma'=>'required|string|max:255',
            'campoAmplio'=>'required|string|max:255',
            'campoEspecifico'=>'required|string|max:255',
            'campoDetallado'=>'required|string|max:255',
            'programa'=>'required|string|max:255',
            'titulo'=>'required|string|max:255',
            'codificacionPrograma'=>'required|string|',
            'lugarEjecucion'=>'required|string|max:255',
            'duracion'=>'required|string|max:255',
            'tipoPeriodo'=>'required|string|max:255',
            'numeroHoras'=>'required|numeric',
            'resolucion'=>'required|string|max:255',
            'fechaResolucion'=>'required|string|date',
            'modalidad'=>'required|string|max:255',
            'paralelos'=>'required|numeric',
            'vigencia'=>'required|string|max:255',
            'fechaAprobacion'=>'required|string|date',
            'capacidadParalelo'=>'required|numeric',
        ];
    }
}
