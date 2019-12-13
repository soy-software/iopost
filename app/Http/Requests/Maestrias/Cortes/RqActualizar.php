<?php

namespace App\Http\Requests\Maestrias\Cortes;

use Illuminate\Foundation\Http\FormRequest;

class RqActualizar extends FormRequest
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
        $rg_decimal="/^[0-9,]+(\.\d{0,2})?$/";
        return [
            'corte'=>'required|exists:cortes,id',
            'valorRegistro'=>'required|regex:'.$rg_decimal,
            'valorMatricula'=>'required|regex:'.$rg_decimal,
            'valorColegiatura'=>'required|regex:'.$rg_decimal,
            'fechaInicioDocumentos'=>'required|date',
            'fechaFinDocumentos'=>'required|date|after_or_equal:fechaInicioDocumentos',
            'fechaAdmision'=>'required|date',
            'horaAdmision'=>'required',
            'entrevistaEnsayo'=>'required|date',
            'presentacionInformes'=>'required|date',
            'resolucionProcesoAdmitidos'=>'required|date',
            'publicacionAdmitidos'=>'required|date',
            'inicioClases'=>'required|date',
            'fechaInicioMatricula'=>'required|date',
            'fechaFinMatricula'=>'required|date|after_or_equal:fechaInicioMatricula',
            'coordinadores'=>'array|nullable',
            'coordinadores.*'=>'nullable|exists:users,id'
        ];
    }
}
