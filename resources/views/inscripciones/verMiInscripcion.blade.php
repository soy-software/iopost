@extends('layouts.app',['title'=>'Ver mi inscripción'])
@section('breadcrumbs', Breadcrumbs::render('verMiInscripcion',$inscripcion))
@section('content')
<div class="card">
    <div class="card-header">
        Detalle de la inscripción
        <a href="{{ route('inscripcionPdf',$inscripcion->id) }}" target="_blanck" class="float-right" data-toggle="tooltip" data-placement="top" title="Descar a PDF">
            <i class="far fa-file-pdf fa-2x"></i>
        </a>
    </div>
    <div class="card-body">
        @include('inscripciones.info',['inscripcion'=>$inscripcion])
    </div>
</div>

@prepend('linksPie')
    <script>
    $('#menuMisInscripciones').addClass('active');  
    </script>
@endprepend

@endsection
