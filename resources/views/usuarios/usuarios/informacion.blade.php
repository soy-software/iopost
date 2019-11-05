@extends('layouts.app',['title'=>'información usuario'])
@section('breadcrumbs', Breadcrumbs::render('informacionUsuario',$usuario))
@section('content')
<div class="card">
    <div class="card-header">Información del usuario </div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>
                        Email: <strong>{{ $usuario->email }}</strong>
                    </th>
                    <th>
                        </strong> <span class="badge badge-light badge-striped badge-striped-right border-right-{{$usuario->estado=='Activo'?'success':'danger'}}">{{$usuario->estado=='Activo'?'Activo':'Inactivo'}}</span>
                    </th>
                </tr>
                <tr>
                    <th >Nombres y apelidos: <strong> {{ $usuario->nombres??'---' }} {{ $usuario->apellidos??'---' }}
                    </th>                                    
                    <th >
                        @if (Storage::exists($usuario->foto))
                            <a href="{{ Storage::url($usuario->foto) }}" class="btn-link" data-toggle="tooltip" data-placement="top" title="Ver foto">
                                <img src="{{ Storage::url($usuario->foto) }}" alt="" class="img-fluid" width="45px;">
                            </a>
                        @else
                            <img src="{{ asset('img/face.jpg') }}" alt="" class="img-fluid" width="45px;">
                        @endif
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
            </tbody>
        </table>
    </div>
</div>

@prepend('linksPie')
    <script>
    $('#menuUsuarios').addClass('active');
    </script>
    
@endprepend
@endsection