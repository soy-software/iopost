<?php

namespace App\Http\Requests\Usuarios;

use Illuminate\Foundation\Http\FormRequest;

class RqActualizarRegistroAcademico extends FormRequest
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
            'usuario'=>'required|exists:users,id',
            'institucion_pregrado'=>'required|string|max:255',
            'tipo_pregrado'=>'required|in:PÚBLICA,PRIVADA,MIXTA',
            'titulo_pregrado'=>'required|max:255|string',
            'especialidad_pregrado'=>'required|max:255|string',
            'duracion_pregrado'=>'nullable|integer|min:0',
            'fecha_graduacion_pregrado'=>'nullable|date',
            'calificacion_grado_pregrado'=>'nullable|regex:'.$rg_decimal,
            'pais_pregrado'=>'nullable|string|max:255',
            'provincia_pregrado'=>'nullable|string|max:255',
            'canton_pregrado'=>'nullable|string|max:255',

            'institucion_posgrado'=>'nullable|max:255|string',
            'titulo_posgrado'=>'nullable|max:255|string',
            'especialidad_posgrado'=>'nullable|max:255|string',
            'duracion_posgrado'=>'nullable|integer|min:0',
            'fecha_graduacion_posgrado'=>'nullable|date',
            'calificacion_grado_posgrado'=>'nullable|regex:'.$rg_decimal,
            'pais_posgrado'=>'nullable|string|max:255',
            'provincia_posgrado'=>'nullable|string|max:255',
            'canton_posgrado'=>'nullable|string|max:255',
        ];
    }
}
