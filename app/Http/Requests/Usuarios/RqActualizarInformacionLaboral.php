<?php

namespace App\Http\Requests\Usuarios;

use Illuminate\Foundation\Http\FormRequest;

class RqActualizarInformacionLaboral extends FormRequest
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
            'usuario'=>'required|exists:users,id',
            'trabaja'=>'required|in:SI,NO',
            'tipo_institucion'=>'required|in:PÚBLICA,PRIVADA,MIXTA',
            'nombre_empresa'=>'nullable|max:255|string',
            'cargo'=>'nullable|string|max:255',
            'parroquia_laboral'=>'nullable|exists:parroquias,id',
            'direccion_laboral'=>'nullable|string|max:255',
            'telefono_laboral'=>'nullable|numeric|digits_between:1,15',
            'extencion'=>'nullable|numeric|digits_between:1,15',
            'email_laboral'=>'nullable|email|string|max:255',
        ];
    }
}
