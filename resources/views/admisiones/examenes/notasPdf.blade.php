<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <title>Resutado_COHORTE_N_{{ $cohorte->numero }}_MAESTRÍA_{{ $cohorte->maestria->nombre }}</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%
        }
            
        table, th, td {
            border: 1px solid black;
            text-align: center;
        }
        .noBorder {
            border:none !important;
        }
        
    </style>
</head>
<body>
    <table style="border-collapse: collapse; border: none;">
        <tr>
            <td class="noBorder">
                <img src="{!! public_path('img/utc.png') !!}" alt="" width="120px;" style="text-align: right;">
            </td>
            <td class="noBorder">
                <h4 style="text-align: center;">
                    UNIVERSIDAD TÉCNICA DE COTOPAXI <br>
                    POSGRADO
                </h4>
            </td>
            <td class="noBorder">
                
                <img src="{!! public_path('img/posgrado.jpeg') !!}" alt="" width="120px;" style="text-align: right;">
            </td>
        </tr>
    </table>
    <hr>
    <table style="border-collapse: collapse; border: none;">
        <tr style="text-align: center;">
            <td class="noBorder" colspan="3"><strong>RESULTADO DE PROCESO DE ADMISIÓN - ELEGIBLES</strong></td>
        </tr>
        <tr>
            <td class="noBorder" colspan="2">
                <strong>MAESTRÍA:</strong> {{ $cohorte->maestria->nombre }}
            </td>
            <td class="noBorder">
                <strong>PROMOCIÓN:</strong> {{ $cohorte->numero }}
            </td>
        </tr>
        <tr>
            <td class="noBorder">
                <strong>SEDE:</strong>{{ $cohorte->maestria->lugarEjecucion }}
            </td>
            <td class="noBorder">
                <strong>MODALIDAD:</strong>{{ $cohorte->maestria->modalidad }}
            </td>
            <td class="noBorder">
                <strong>AÑO:</strong>{{ $cohorte->created_at->year }}
            </td>
        </tr>
    </table>
    <hr>

    @if (count($inscripciones)>0)
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Estudiante</th>
            <th scope="col">Identificación</th>
            <th scope="col">Examen</th>
            <th scope="col">Entrevista</th>
            <th scope="col">Ensayo</th>
            <th scope="col">Total</th>
          </tr>
        </thead>
        <tbody>
          @php($i=0)
            @foreach ($inscripciones as $inscrito)
            @php($i++)
            <tr>
                <th scope="row">
                    {{ $i }}
                </th>
                <td style="text-align: justify;">
                    {{ $inscrito->user->nombres }} {{ $inscrito->user->apellidos }}
                </td>
                <td style="text-align: justify;">
                    {{ $inscrito->user->identificacion }}
                </td>
                <td>
                    {{ $inscrito->admision->examen??0 }}
                </td>
                <td>
                    {{ $inscrito->admision->entrevista??0 }}
                </td>
                <td>
                    {{ $inscrito->admision->ensayo??0 }}
                </td>
                <td>
                    {{ ($inscrito->admision->examen??0)+($inscrito->admision->entrevista??0)+($inscrito->admision->ensayo??0) }}
                </td>
            </tr>
            @endforeach

        </tbody>
      </table>
    @else
        <p>No existe registros</p>
    @endif
    

</body>
</html>