@extends('layouts.app',['title'=>'información usuario'])



@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Información del usuario </div>

                <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th colspan="2">
                                        Email: <strong>{{ $usuario->email }}</strong>
                                    </th>
                                </tr>
                                <tr>
                                    <th >Nombre: <strong> {{ $usuario->nombres.' '.$usuario->apellidos }}</strong> <span class="badge badge-light badge-striped badge-striped-right border-right-{{$usuario->estado=='Activo'?'success':'danger'}}">{{$usuario->estado=='Activo'?'Activo':'Inactivo'}}</span></th>                                    
                                    <th >
                                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT2qjD8tSRg_PduYe6yFiLNQE7Cdlr2IDUWiySkIJBitCJry633cA&s" class="img-fluid " >
                                     </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    
                                    <th scope="row">Tipo identificación: <strong> {{$usuario->tipo_identificacion}} </strong></th> 
                                    <th scope="row">Identificación: <strong> {{ $usuario->identificacion}}</strong></th>                                  
                                </tr>
                                <tr>
                                    <th scope="row">Fecha nacimiento: <strong> {{ $usuario->fecha_nacimiento }} </strong></th>                                    
                                    <th scope="row">Edad: <strong>  {{Carbon\Carbon::parse($usuario->fecha_nacimiento)->age}}</strong></th>
                                </tr>
                                <tr>
                                    <th scope="row">Estado Civil: <strong> {{$usuario->estado_civil}} </strong></th>
                                    <th scope="row">Etnia: <strong> {{$usuario->etnia}} </strong></th>                                    
                                </tr>
                                <tr>
                                    <th scope="row">Teléfono: <strong> {{$usuario->telefono}} </strong></th>
                                    <th scope="row">Celular: <strong> {{$usuario->celular}} </strong></th>                                    
                                </tr>
                                <tr>
                                    <th scope="row">Pais: <strong> {{$usuario->pais}} </strong></th>
                                    <th scope="row">Provincias: <strong> {{$usuario->provincia}} </strong></th>                                    
                                </tr>

                                <tr>
                                    <th scope="row">Cantón: <strong> {{$usuario->canton}} </strong></th>
                                    <th scope="row">Parroquia: <strong> {{$usuario->parroquia}} </strong></th>                                    
                                </tr>
                                <tr>
                                    <th scope="row">Dirección: <strong> {{$usuario->direccion}} </strong></th>
                                    <th scope="row">Tiene Discapacidad: <strong> {{$usuario->tiene_discapacidad}} </strong></th>                                    
                                </tr>

                                <tr>
                                    <th scope="row">Porcentaje discapacidad: <strong> {{$usuario->porcentaje_discapacidad}} </strong></th>
                                    <th scope="row">Tiene carnet conadis: <strong> {{$usuario->tiene_carnet_conadis}} </strong></th>                                    
                                </tr>
                                <tr>
                                    <th scope="row">porcentaje carnet conadis: <strong> {{$usuario->porcentaje_carnet_conadis}} </strong></th>
                                    {{-- <th scope="row">Vigencia: <strong> {{$usuario->vigencia}} </strong></th>                                     --}}
                                </tr>
                                {{-- <tr>
                                    <th scope="row">Capacidad por Paralelos: <strong> {{$usuario->Capacidadparalelos}} </strong></th>
                                    <th scope="row">Fecha Aprobación: <strong> {{$usuario->fechaAprobacion}} </strong> {{Carbon\Carbon::parse($usuario->fechaAprobacion)->age}} Años</th>                                    
                                </tr> --}}
                            </tbody>
                            </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection