@extends('layouts.app',['title'=>'nueva de maestría'])

@section('breadcrumbs', Breadcrumbs::render('informacionMaestria',$maestria))

@section('content')
<div class="card">
    <div class="card-header">Información de la Maestría </div>

    <div class="card-body">
       
        @include('maestrias.info',['maestria'=>$maestria])

    </div>
</div>
@prepend('linksPie')
    <script>
        $('#menuMaestria').addClass('active');    
    </script>   
@endprepend
@endsection