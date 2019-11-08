@extends('layouts.app',['title'=>'información usuario'])
@section('breadcrumbs', Breadcrumbs::render('informacionUsuario',$usuario))
@section('content')
<div class="card">
    <div class="card-header">Información del usuario </div>
    <div class="card-body">
        @include('usuarios.usuarios.info',['usuario'=>$usuario])
    </div>
</div>

@prepend('linksPie')
    <script>
    $('#menuUsuarios').addClass('active');
    </script>
    
@endprepend
@endsection