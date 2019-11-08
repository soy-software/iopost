@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        Detalle de la inscripción
        <a href="{{ route('inscripcionPdf',$inscripcion->id) }}" class="float-right" data-toggle="tooltip" data-placement="top" title="Descar a PDF">
            <i class="far fa-file-pdf fa-2x"></i>
        </a>
    </div>
    <div class="card-body">
        @include('inscripciones.info',['inscripcion'=>$inscripcion])
    </div>
</div>

@prepend('linksPie')
    <script>
    $('#menuHome').addClass('active');  
    </script>
@endprepend

@endsection
