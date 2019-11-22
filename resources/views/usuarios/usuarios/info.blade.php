<table class="table table-bordered">
    
    <tbody>
        <tr>
            <th colspan="2" class="text-center" style="text-align: center;">Datos personales</th>
        </tr>
        <tr>
            <td>
                <strong>Email:</strong> {{ $usuario->email }}
            </td>
            <td>
                <strong>Nombres y apelidos:</strong> {{ $usuario->nombres??'---' }} {{ $usuario->apellidos??'---' }}
            </td>
        </tr>
        <tr>
            <td><strong>Tipo identificación:</strong> {{$usuario->tipo_identificacion}}</td>
            <td><strong>Identificación:</strong> {{ $usuario->identificacion??'---'}}</td>
        </tr>
        <tr>
            <td>
                <strong>Fecha nacimiento:</strong>
                {{ $usuario->fecha_nacimiento??'---' }}, 
                <strong>Edad:</strong>  {{Carbon\Carbon::parse($usuario->fecha_nacimiento)->age }}
            </td>                                    
            <td>
                <strong>Sexo:</strong> {{  $usuario->sexo }}
            </td>
        </tr>
        <tr>
            <td><strong>Estado Civil:</strong> {{$usuario->estado_civil}}</td>
            <td><strong>Etnia:</strong>{{$usuario->etnia}}</td>
        </tr>
        <tr>
            <td><strong>Teléfono:</strong> {{$usuario->telefono??'---'}} </td>
            <td><strong>Celular:</strong> {{$usuario->celular??'---'}} </td>
        </tr>
        <tr>
            <td><strong>País:</strong> {{$usuario->pais??'---'}}</td>
            <td><strong>Provincia:</strong>{{$usuario->parroquia->canton->provincia->provincia??'---'}}</td>
        </tr>

        <tr>
            <td><strong>Cantón:</strong> {{$usuario->parroquia->canton->canton??'---' }} </td>
            <td><strong>Parroquia:</strong> {{$usuario->parroquia->parroquia??'---'}} </td>
        </tr>
        <tr>
            <td><strong>Dirección:</strong> {{$usuario->direccion??'---'}}</td>
            <td><strong>Tiene Discapacidad:</strong> {{$usuario->tiene_discapacidad}}</td>
        </tr>

        <tr>
            <td><strong>Porcentaje discapacidad:</strong> {{$usuario->porcentaje_discapacidad}}</td>
            <td><strong>Tiene carnet conadis:</strong> {{$usuario->tiene_carnet_conadis}}</td>
        </tr>
        <tr>
            <td><strong>Porcentaje carnet conadis:</strong>{{$usuario->porcentaje_carnet_conadis}}</td>
            <td>
                <strong>Roles:</strong>   @foreach ($usuario->getRoleNames() as $rol)
                            {{ $rol }},
                        @endforeach
            </td>
        </tr>
    </tbody>
</table>
<h1 class="text-danger">Información laboral</h1>
<table class="table table-bordered">
        @if ($usuario->informacionLaboral)
        @php($infoL=$usuario->informacionLaboral)
               
            <tr>
                <td>
                    <strong>Trabaja:</strong> {{ $infoL->trabaja }}
                </td>
                <td>
                    <strong>Tipo de institución:</strong> {{ $infoL->tipo_institucion }}
                </td>
            </tr>
            <tr>
                <td>
                    <strong>Empresa:</strong>{{ $infoL->nombre_empresa }}
                </td>
                <td>
                    <strong>Cargo:</strong> {{ $infoL->cargo }}
                </td>
            </tr>

            <tr>
                <td>
                    <strong>Dirección:</strong>
                    
                        {{ $infoL->direccion??'' }} -
                        {{ $infoL->parroquia->parroquia??'' }} -
                        {{ $infoL->parroquia->canton->canton??'' }} -
                        {{ $infoL->parroquia->canton->provincia->provincia??'' }}
                    
                </td>
                <td>
                    <strong>Teléfono:</strong>{{ $infoL->telefono }}
                    
                </td>
            </tr>

            <tr>
                <td>
                    <strong>Extención:</strong>{{ $infoL->extencion }}
                </td>
                <td>
                    <strong>Email: </strong>{{ $infoL->email }}
                </td>
            </tr>
        @endif
</table>

<h1 class="text-danger">Información laboral</h1>
@if (count($usuario->registrosAcademicos)>0)
                        
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">Institución</th>
                <th scope="col">Nivel</th>
                <th scope="col">Tipo</th>
                <th scope="col">Título</th>
                <th scope="col">Especialidad</th>
                <th scope="col">Duración</th>
                <th scope="col">Fecha de graduación</th>
                <th scope="col">Calificación</th>
                <th scope="col">País</th>
                <th scope="col">Provincia</th>
                <th scope="col">Cantón</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($usuario->registrosAcademicos as $ra)
                <tr>
                    
                    <th scope="row">
                        {{ $ra->institucion_pregrado }}
                    </th>
                    <td>
                        {{ $ra->nivel }}
                    </td>
                    <td>
                        {{ $ra->tipo_pregrado }}
                    </td>
                    <td>
                        {{ $ra->titulo_pregrado }}
                    </td>
                    <td>
                        {{ $ra->especialidad_pregrado }}
                    </td>
                    <td>
                        {{ $ra->duracion_pregrado }}
                    </td>
                    <td>
                        {{ $ra->fecha_graduacion_pregrado }}
                    </td>
                    <td>
                        {{ $ra->calificacion_grado_pregrado }} 
                    </td>
                    <td>
                        {{ $ra->pais_pregrado }}
                    </td>
                    <td>
                        {{ $ra->provincia_pregrado }}
                    </td>
                    <td>
                        {{ $ra->canton_pregrado }}
                    </td>
                </tr>    
            @endforeach
            
        </tbody>
    </table>
@endif