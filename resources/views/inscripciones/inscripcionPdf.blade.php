<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inscripción</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            text-align: justify;
        }
            
        table, th, td {
        border: 1px solid black;
        }
        .noBorder {
            border:none !important;
            
        }
    </style>
</head>
<body>
        <table style="border-collapse: collapse; border: none;">
            <td class="noBorder" style="text-align: center;">
                <img src="{!! public_path('img/utc.png') !!}" alt="" width="250px;" style="text-align: right;">
                <h3>
                    UNIVERSIDAD TÉCNICA DE COTOPAXI
                </h3>
                <h3>
                    <strong>
                        FORMULARIO DE REGISTRO DE MAESTRÍA
                    </strong>
                </h3>
            </td>
        </table>
        <table>
            <tr>
                <td style="text-align: center;">
                    <p><strong>Fecha de emisión:</strong> {{ Carbon\Carbon::now() }}</p>
                </td>
                <td style="text-align: center;">
                    <p><strong>Número de documento:</strong> {{ $inscripcion->id }}</p>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center;">
                    <h4>
                        COMPROBANTE DE REGISTRO DE MAESTRÍA UTC 
                    </h4>
                    <h4>
                        DATOS DEL POSTULANTE
                    </h4>
                    
                </td>
            </tr>
            <tr>
                <td>
                    <strong>Identificación: </strong> {{ $inscripcion->user->identificacion }}
                </td>
                <td>
                    <strong>Tipo de identificación:</strong> {{ $inscripcion->user->tipo_identificacion }}
                </td>
            </tr>
            <tr>
                <td>
                    <strong>Nombres: </strong> {{ $inscripcion->user->nombres }}
                </td>
                <td>
                    <strong>Apellidos:</strong> {{ $inscripcion->user->apellidos }}
                </td>
            </tr>
            <tr>
                <td>
                    <strong>Email:</strong> {{ $inscripcion->user->email }}
                </td>
                <td>
                    <strong>Sexo:</strong> {{ $inscripcion->user->sexo }}
                </td>
            </tr>
            <tr>
                <td>
                    <strong>Teléfono:</strong> {{ $inscripcion->user->telefono }}
                </td>
                <td>
                    <strong>Celular:</strong> {{ $inscripcion->user->celular }}
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <strong>Dirección: </strong> 
                    {{ $inscripcion->user->parroquia->canton->provincia->provincia??'' }} -
                    {{ $inscripcion->user->parroquia->canton->canton??'' }} - 
                    {{ $inscripcion->user->parroquia->parroquia??'' }} - 
                    {{ $inscripcion->user->direccion??'' }}
                </td>
            </tr>

            <tr>
                <td>
                    <strong>Maestría a la que se postula: </strong>
                    {{ $inscripcion->corte->maestria->nombre }}
                </td>
                <td>
                    <strong>Corte: </strong>
                    {{ $inscripcion->corte->numero }}
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <strong>Fecha de registro: </strong>
                    {{ $inscripcion->created_at }}
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: right; padding-right: 15px;">
                    <h3>
                            <strong>Valor a cancelar: </strong>
                            $ {{ $inscripcion->valorMatricula }} 
                    </h3>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <strong>Información adicional:</strong> <br>
                    <ul>
                        <li>
                            Registro generado exitosamente, por favor revisa su cuenta de correo electrónico, y sigue las instrucciones.
                        </li>
                        <li>
                            Para finalizar el registro de maestría, debe subir el comprobante de registro en la siguente url: <br> <a href="{{ route('subirComprobantePago',$inscripcion->id) }}">{{ route('subirComprobantePago',$inscripcion->id) }}</a>
                        </li>
                        <li>
                             Cuentas Bancarias, para el pago del registro de maestría:
                        </li>
                        <table style="text-align: center; width: 95%;">
                            <thead>
                                <tr>
                                    <th>
                                        Banco
                                    </th>
                                    <th>
                                        Tipo de cuenta
                                    </th>
                                    <th>
                                        Número de cuenta
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        Banco de Guayaquil
                                    </td>
                                    <td>
                                        Cuenta de ahorros
                                    </td>
                                    <td>
                                        26421068
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Banco de Pichincha
                                    </td>
                                    <td>
                                        Cuenta corriente
                                    </td>
                                    <td>
                                        26421068
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Banco de Pacifico
                                    </td>
                                    <td>
                                        Cuenta corriente
                                    </td>
                                    <td>
                                        26421068
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </ul>
                </td>
            </tr>
        </table>

        
</body>
</html>