<?php

namespace App\Http\Requests\Usuarios;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class RqActualizarDatosPerfil extends FormRequest
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
                $rg_tipo_identificacion='ecuador:ci|unique:users,identificacion,'.Auth::id();
                break;
            case 'Ruc persona Natural':
                $rg_tipo_identificacion='ecuador:ruc|unique:users,identificacion,'.Auth::id();
                break;
            case 'Ruc Sociedad Pública':
                $rg_tipo_identificacion='ecuador:ruc_spub|unique:users,identificacion,'.Auth::id();
                break;
            case 'Ruc Sociedad Privada':
                $rg_tipo_identificacion='ecuador:ruc_spriv|unique:users,identificacion,'.Auth::id();
                break;
            case 'Pasaporte':
                $rg_tipo_identificacion='unique:users,identificacion,'.Auth::id();
                break;
            case 'Otros':
                $rg_tipo_identificacion='unique:users,identificacion,'.Auth::id();
                break;
        }

        return [
            'password'=>'nullable|string|max:255|min:8',
            'primer_nombre'=>'required|string|max:255', 
            'segundo_nombre'=>'required|string|max:255', 
            'primer_apellido'=>'required|string|max:255',
            'segundo_apellido'=>'required|string|max:255',
            'sexo'=>'required|in:Masculino,Femenino',
            'tipo_identificacion'=>'required|in:Cédula,Ruc persona Natural,Ruc Sociedad Pública,Ruc Sociedad Privada,Pasaporte,Otros',
            'identificacion'=>'required|string|'.$rg_tipo_identificacion,
            'fecha_nacimiento'=>'required|date',
            'estado_civil'=>'required|in:Soltero/a,Casado/a,Divorciado/a,Vuido/a',
            'etnia'=>'required|in:Mestizos,Blancos,Afroecuatorianos,Indígenas,Montubios,otros',
            'telefono'=>'required|numeric|digits_between:1,15',
            'celular'=>'required|numeric|digits_between:1,15',
            'pais'=>'required',
            'provincia'=>'required',
            'canton'=>'required', 
            'parroquia'=>'required',
            'direccion'=>'required|max:255|string', 
            'tiene_discapacidad'=>'required|in:SI,NO',
            'porcentaje_discapacidad'=>'nullable|regex:'.$rg_decimal,
            'tiene_carnet_conadis'=>'required|in:SI,NO',
            'porcentaje_carnet_conadis'=>'nullable|regex:'.$rg_decimal,
            'foto'=>'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ];
    }
}
