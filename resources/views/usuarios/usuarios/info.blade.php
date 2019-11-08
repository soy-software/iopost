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
        
        
        @if ($usuario->informacionLaboral)
        @php($infoL=$usuario->informacionLaboral)
            <tr>
                <th colspan="2" class="text-center" style="text-align: center;">Información laboral</th>
            </tr>    
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
        
        @if ($usuario->registroAcademico)
        @php($regAcademico=$usuario->registroAcademico)
            <tr>
                <td colspan="2" class="text-center" style="text-align: center;">
                    <strong>Registros académicos</strong>
                </td>
            </tr>
            <tr>
                <td colspan="2" class="text-center" style="text-align: center;">
                    Pregrado
                </td>
            </tr>
            <tr>
                <td>
                    <strong>Institución:</strong> {{ $regAcademico->institucion_pregrado }}
                </td>
                <td>
                    <strong>Tipo de institución:</strong> {{ $regAcademico->tipo_pregrado }}
                </td>
            </tr>
            <tr>
                <td>
                    <strong>Título:</strong> {{ $regAcademico->titulo_pregrado }}
                </td>
                <td>
                    <strong>Especialidad:</strong>{{ $regAcademico->especialidad_pregrado }}
                </td>
            </tr>
            <tr>
                <td>
                    <strong>Duración (años):</strong>{{ $regAcademico->duracion_pregrado }}
                </td>
                <td>
                    <strong>Fecha graduación:</strong>{{ $regAcademico->fecha_graduacion_pregrado }}
                </td>
            </tr>

            <tr>
                <td>
                    <strong>Calificación:</strong>{{ $regAcademico->calificacion_grado_pregrado }}
                </td>
                <td>
                    <strong>País:</strong>{{ $regAcademico->pais_pregrado }}
                </td>
            </tr>
            <tr>
                <td>
                    <strong>Provincia:</strong>{{ $regAcademico->provincia_pregrado }}
                </td>
                <td>
                    <strong>Cantón:</strong>{{ $regAcademico->canton_pregrado }}
                </td>
            </tr>
            <tr>
                <td colspan="2" class="text-center" style="text-align: center;">
                    Posgrado
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <strong>Institución:</strong>{{ $regAcademico->institucion_posgrado }}
                </td>
            </tr>
            <tr>
                <td>
                    <strong>Título:</strong>{{ $regAcademico->titulo_posgrado }}
                </td>
                <td>
                    <strong>Especialidad:</strong>{{ $regAcademico->especialidad_posgrado }}
                </td>
            </tr>
            <tr>
                <td>
                    <strong>Duración (años):</strong>{{ $regAcademico->duracion_posgrado }}
                </td>
                <td>
                    <strong>Fecha graduación:</strong>{{ $regAcademico->fecha_graduacion_posgrado }}
                </td>
            </tr>

            <tr>
                <td>
                    <strong>Calificación:</strong> {{ $regAcademico->calificacion_grado_posgrado }}
                </td>
                <td>
                    <strong>País:</strong>{{ $regAcademico->pais_posgrado }}
                </td>
            </tr>
            <tr>
                <td>
                    <strong>Provincia:</strong>{{ $regAcademico->provincia_posgrado }}
                </td>
                <td>
                    <strong>Cantón:</strong>{{ $regAcademico->canton_posgrado }}
                </td>
            </tr>

        @endif

        
    </tbody>
</table>