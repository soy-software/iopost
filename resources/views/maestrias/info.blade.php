<table class="table table-bordered">
    <tbody>
        <tr>
            <td> <strong>Nombre:</strong> {{ $maestria->nombre }} </td>
            <td><strong>Campo Amplio:</strong> {{$maestria->campoAmplio}}</td>
        </tr>

        <tr>
            <td><strong>Campo Específico:</strong> {{ $maestria->campoEspecifico}}</td>
            <td><strong>Campo Detallado:</strong> {{ $maestria->campoDetallado}} </td>
        </tr>
        <tr>
            <td><strong>Programa:</strong> {{$maestria->programa}}</td>
            <td><strong>Título:</strong>  {{$maestria->titulo}}</td>
        </tr>
        <tr>
            <td><strong>Codificación programa:</strong>{{ $maestria->codificacionPrograma}}</td>
            <td><strong>Lugar de ejecución:</strong> {{ $maestria->lugarEjecucion}}</td>
        </tr>
        <tr>
            <td><strong>Duración:</strong> {{ $maestria->duracion}}</td>
            <td><strong>Tipo Periodo:</strong>{{ $maestria->tipoPeriodo}}</td> 
        </tr>
        <tr>
            <td><strong>Número de horas:</strong> {{$maestria->numeroHoras}}</td>
            <td><strong>Resolución:</strong> {{ $maestria->resolucion}}</td>
        </tr>

        <tr>
            <td><strong>Modalidad:</strong> {{ $maestria->modalidad}}</td>
            <td><strong>Fecha de Resolución:</strong> {{$maestria->fechaResolucion}}</td>
        </tr>
        <tr>
            <td><strong>Paralelos:</strong> {{$maestria->paralelos}}</td>
            <td><strong>Vigencia:</strong> {{$maestria->vigencia}} </td>                                    
        </tr>
        <tr>
            <td><strong>Capacidad por Paralelos:</strong> {{$maestria->Capacidadparalelos}}</td>
            <td><strong>Fecha Aprobación:</strong> {{$maestria->fechaAprobacion}} </strong> {{Carbon\Carbon::parse($maestria->fechaAprobacion)->age}} Años</td>
        </tr>
    </tbody>
</table>