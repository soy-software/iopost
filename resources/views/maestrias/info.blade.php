<table class="table table-bordered">
        
        <tbody>
            
            <tr>
                <th>Nombre: <strong> {{$maestria->nombre}}</strong> 
                <th>Campo Amplio: <strong> {{$maestria->campoAmplio}}</strong></th>                                  
            </tr>

            <tr>
                <th scope="row">Campo Específico: <strong> {{$maestria->campoEspecifico}} </strong></th>
                <th scope="row">Campo Detallado: <strong> {{$maestria->campoDetallado}} </strong></th>                                    
            </tr>
            <tr>
                <th scope="row">Programa: <strong> {{$maestria->programa}} </strong></th>
                <th scope="row">Título: <strong> {{$maestria->titulo}} </strong></th>                                    
            </tr>
            <tr>
                <th scope="row">Codificación programa: <strong> {{$maestria->codificacionPrograma}} </strong></th>
                <th scope="row">Lugar de ejecución: <strong> {{$maestria->lugarEjecucion}} </strong></th>                                    
            </tr>
            <tr>
                <th scope="row">Duración: <strong> {{$maestria->duracion}} </strong></th>
                <th scope="row">Tipo Periodo: <strong> {{$maestria->tipoPeriodo}} </strong></th>                                    
            </tr>
            <tr>
                <th scope="row">Número de horas: <strong> {{$maestria->numeroHoras}} </strong></th>
                <th scope="row">Resolución: <strong> {{$maestria->resolucion}} </strong></th>                                    
            </tr>

            <tr>
                <th scope="row">Modalidad: <strong> {{$maestria->modalidad}} </strong></th>
                <th scope="row">Fecha de Resolución: <strong> {{$maestria->fechaResolucion}} </strong></th>                                    
            </tr>
            <tr>
                <th scope="row">Paralelos: <strong> {{$maestria->paralelos}} </strong></th>
                <th scope="row">Vigencia: <strong> {{$maestria->vigencia}} </strong></th>                                    
            </tr>
            <tr>
                <th scope="row">Capacidad por Paralelos: <strong> {{$maestria->Capacidadparalelos}} </strong></th>
                <th scope="row">Fecha Aprobación: <strong> {{$maestria->fechaAprobacion}} </strong> {{Carbon\Carbon::parse($maestria->fechaAprobacion)->age}} Años</th>                                    
            </tr>
        </tbody>
    </table>