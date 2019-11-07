<?php

namespace App\Http\Requests\Inscripciones;

use Illuminate\Foundation\Http\FormRequest;

class RqProcesar extends FormRequest
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

        $rg_tipo_identificacion='';
        switch ($this->input('tipo_identificacion')) {
            case 'Cédula':
                $rg_tipo_identificacion='ecuador:ci';
                break;
            case 'Ruc persona Natural':
                $rg_tipo_identificacion='ecuador:ruc';
                break;
            case 'Ruc Sociedad Pública':
                $rg_tipo_identificacion='ecuador:ruc_spub';
                break;
            case 'Ruc Sociedad Privada':
                $rg_tipo_identificacion='ecuador:ruc_spriv';
                break;
            case 'Pasaporte':
                $rg_tipo_identificacion='';
                break;
            case 'Otros':
                $rg_tipo_identificacion='';
                break;
        }

        return [
            //datos personales
            'corte'=>'required|exists:cortes,id',
            'email'=>'required|string|email|max:255',
            'nombres'=>'required|string|max:255', 
            'apellidos'=>'required|string|max:255',
            'sexo'=>'required|in:Masculino,Femenino',
            'tipo_identificacion'=>'required|in:Cédula,Ruc persona Natural,Ruc Sociedad Pública,Ruc Sociedad Privada,Pasaporte,Otros',
            'identificacion'=>'required|string|'.$rg_tipo_identificacion,
            'fecha_nacimiento'=>'required|date',
            'estado_civil'=>'required|in:Soltero/a,Casado/a,Divorciado/a,Vuido/a',
            'etnia'=>'required|in:Mestizos,Blancos,Afroecuatorianos,Indígenas,Montubios,otros',
            'telefono'=>'required|numeric|digits_between:1,15',
            'celular'=>'required|numeric|digits_between:1,15',
            'pais'=>'required|string|max:255',
            'parroquia'=>'required|exists:parroquias,id',
            'direccion'=>'required|max:255|string', 

            //informacion laboral
            'trabaja'=>'required|in:SI,NO',
            'tipo_institucion'=>'required|in:PÚBLICA,PRIVADA,MIXTA',
            'nombre_empresa'=>'nullable|max:255|string',
            'cargo'=>'nullable|string|max:255',
            'parroquia_laboral'=>'nullable|exists:parroquias,id',
            'direccion_laboral'=>'nullable|string|max:255',
            'telefono_laboral'=>'nullable|numeric|digits_between:1,15',
            'extencion'=>'nullable|numeric|digits_between:1,15',
            'email_laboral'=>'nullable|email|string|max:255',

            //informacion academica
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
            
            'acceptoTerminos'=>'required'


        ];
    }
}
