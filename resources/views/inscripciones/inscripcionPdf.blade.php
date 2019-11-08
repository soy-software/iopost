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
                <img src="{!! public_path('img/utc.png') !!}" alt="" width="125px;" style="text-align: right;">
                <h4>
                    UNIVERSIDAD TÉCNICA DE COTOPAXI
                </h4>
                <small>Formulario de inscripción # {{ $inscripcion->id }}</small>
            </td>
        </table>
    @include('inscripciones.info')
    <p>
        <strong>NOTA 1: </strong>Por favor, acerquese con este documento a la secretaría de posgrados a realizar el pago correspondiente de la inscripción.
    </p>
    <p>
        <strong>NOTA 2:</strong> O puede subir le voucher del deposito en la siguente url:  <a href="">{{ route('subirComprobantePago',$inscripcion->id) }}</a>
    </p>
    <p>
        <strong>NOTA 3:</strong> Cuentas de Bancos Pichincha
    </p>
</body>
</html>