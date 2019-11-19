@extends('layouts.app',['title'=>'Información de la inscripción'])
@section('breadcrumbs', Breadcrumbs::render('informacionAspirante',$inscripcion))
@section('content')

<div class="card">
    <div class="card-header">
        Información de la inscripción
    </div>
    <div class="card-body">
        @include('inscripciones.info',['inscripcion'=>$inscripcion])
    </div>
</div>

@prepend('linksPie')
    <script>
    $('#menuMisMaestria').addClass('active');  
    </script>
@endprepend

@endsection
