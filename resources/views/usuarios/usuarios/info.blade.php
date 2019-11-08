<table class="table table-bordered">
    <thead>
        <tr>
            <th colspan="2" class="text-center">Datos personales</th>
        </tr>
        <tr>
            <th>
                Email: <strong>{{ $usuario->email }}</strong>
            </th>
            <th>
                Nombres y apelidos: <strong> {{ $usuario->nombres??'---' }} {{ $usuario->apellidos??'---' }}
            </th>
        </tr>
    </thead>
    <tbody>
        <tr>
            
            <th scope="row">Tipo identificación: <strong> {{$usuario->tipo_identificacion}} </strong></th> 
            <th scope="row">Identificación: <strong> {{ $usuario->identificacion??'---'}}</strong></th>                                  
        </tr>
        <tr>
            <th scope="row">Fecha nacimiento: 
                <strong> {{ $usuario->fecha_nacimiento??'---' }} </strong>
                Edad: <strong>  {{Carbon\Carbon::parse($usuario->fecha_nacimiento)->age }}</strong>
            </th>                                    
            <th scope="row">
                    Sexo: <strong>  {{  $usuario->sexo }}</strong>
            </th>
        </tr>
        <tr>
            <th scope="row">Estado Civil: <strong> {{$usuario->estado_civil}} </strong></th>
            <th scope="row">Etnia: <strong> {{$usuario->etnia}} </strong></th>                                    
        </tr>
        <tr>
            <th scope="row">Teléfono: <strong> {{$usuario->telefono??'---'}} </strong></th>
            <th scope="row">Celular: <strong> {{$usuario->celular??'---'}} </strong></th>                                    
        </tr>
        <tr>
            <th scope="row">País: <strong> {{$usuario->pais??'---'}} </strong></th>
            <th scope="row">Provincia: <strong> {{$usuario->parroquia->canton->provincia->provincia??'---'}} </strong></th>                                    
        </tr>

        <tr>
            <th scope="row">Cantón: <strong> {{$usuario->parroquia->canton->canton??'---' }} </strong></th>
            <th scope="row">Parroquia: <strong> {{$usuario->parroquia->parroquia??'---'}} </strong></th>                                    
        </tr>
        <tr>
            <th scope="row">Dirección: <strong> {{$usuario->direccion??'---'}} </strong></th>
            <th scope="row">Tiene Discapacidad: <strong> {{$usuario->tiene_discapacidad}} </strong></th>                                    
        </tr>

        <tr>
            <th scope="row">Porcentaje discapacidad: <strong> {{$usuario->porcentaje_discapacidad}} </strong></th>
            <th scope="row">Tiene carnet conadis: <strong> {{$usuario->tiene_carnet_conadis}} </strong></th>                                    
        </tr>
        <tr>
            <th scope="row">Porcentaje carnet conadis: <strong> {{$usuario->porcentaje_carnet_conadis}} </strong></th>
            <th scope="row">
                Roles:   @foreach ($usuario->getRoleNames() as $rol)
                            {{ $rol }},
                        @endforeach
            </th>
        </tr>
        
        
        @if ($usuario->informacionLaboral)
        @php($infoL=$usuario->informacionLaboral)
            <tr>
                <th colspan="2" class="text-center">Información laboral</th>
            </tr>    
            <tr>
                <td>
                    Trabaja: <strong>{{ $infoL->trabaja }}</strong>
                </td>
                <td>
                    Tipo de institución: <strong>{{ $infoL->tipo_institucion }}</strong>
                </td>
            </tr>
            <tr>
                <td>
                    Empresa: <strong>{{ $infoL->nombre_empresa }}</strong>
                </td>
                <td>
                    Cargo: <strong>{{ $infoL->cargo }}</strong>
                </td>
            </tr>

            <tr>
                <td>
                    Dirección: 
                    <strong>
                        {{ $infoL->direccion??'' }} -
                        {{ $infoL->parroquia->parroquia??'' }} -
                        {{ $infoL->parroquia->canton->canton??'' }} -
                        {{ $infoL->parroquia->canton->provincia->provincia??'' }}
                    </strong>
                </td>
                <td>
                    Teléfono: <strong>{{ $infoL->telefono }}</strong>
                    
                </td>
            </tr>

            <tr>
                <td>
                    Extención: <strong>{{ $infoL->extencion }}</strong>
                </td>
                <td>
                    Email: 
                    <strong>
                        {{ $infoL->email }}
                    </strong>
                </td>
            </tr>
        @endif
        
        @if ($usuario->registroAcademico)
        @php($regAcademico=$usuario->registroAcademico)
            <tr>
                <td colspan="2" class="text-center">
                    Registros académicos
                </td>
            </tr>
            <tr>
                <td colspan="2" class="text-center">
                    Pregrado
                </td>
            </tr>
            <tr>
                <td>
                    Institución: <strong>{{ $regAcademico->institucion_pregrado }}</strong>
                </td>
                <td>
                    Tipo de institución: <strong>{{ $regAcademico->tipo_pregrado }}</strong>
                </td>
            </tr>
            <tr>
                <td>
                    Título: <strong>{{ $regAcademico->titulo_pregrado }}</strong>
                </td>
                <td>
                    Especialidad: <strong>{{ $regAcademico->especialidad_pregrado }}</strong>
                </td>
            </tr>
            <tr>
                <td>
                    Duración (años): <strong>{{ $regAcademico->duracion_pregrado }}</strong>
                </td>
                <td>
                    Fecha graduación: <strong>{{ $regAcademico->fecha_graduacion_pregrado }}</strong>
                </td>
            </tr>

            <tr>
                <td>
                    Calificación: <strong>{{ $regAcademico->calificacion_grado_pregrado }}</strong>
                </td>
                <td>
                    País: <strong>{{ $regAcademico->pais_pregrado }}</strong>
                </td>
            </tr>
            <tr>
                <td>
                    Provincia: <strong>{{ $regAcademico->provincia_pregrado }}</strong>
                </td>
                <td>
                    Cantón: <strong>{{ $regAcademico->canton_pregrado }}</strong>
                </td>
            </tr>
            <tr>
                <td colspan="2" class="text-center">
                    Posgrado
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    Institución: <strong>{{ $regAcademico->institucion_posgrado }}</strong>
                </td>
            </tr>
            <tr>
                <td>
                    Título: <strong>{{ $regAcademico->titulo_posgrado }}</strong>
                </td>
                <td>
                    Especialidad: <strong>{{ $regAcademico->especialidad_posgrado }}</strong>
                </td>
            </tr>
            <tr>
                <td>
                    Duración (años): <strong>{{ $regAcademico->duracion_posgrado }}</strong>
                </td>
                <td>
                    Fecha graduación: <strong>{{ $regAcademico->fecha_graduacion_posgrado }}</strong>
                </td>
            </tr>

            <tr>
                <td>
                    Calificación: <strong>{{ $regAcademico->calificacion_grado_posgrado }}</strong>
                </td>
                <td>
                    País: <strong>{{ $regAcademico->pais_posgrado }}</strong>
                </td>
            </tr>
            <tr>
                <td>
                    Provincia: <strong>{{ $regAcademico->provincia_posgrado }}</strong>
                </td>
                <td>
                    Cantón: <strong>{{ $regAcademico->canton_posgrado }}</strong>
                </td>
            </tr>

        @endif

        
    </tbody>
</table>