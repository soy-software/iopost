@extends('layouts.app',['title'=>'Mis incripciones'])
@section('breadcrumbs', Breadcrumbs::render('misInscripciones'))
@section('content')

@if (session('ok'))
    <div class="alert alert-success" role="alert">
        <ul>
            <li><strong>Gracias por subir comprobante de pago  del registro de Maestría.</strong></li>
            <li><strong>Verificaremos el comprobante lo más pronto posible, y aprobaremos su registro.</strong></li>
            <li><strong>Estaremos enviando una notificación de aprobación a su cuenta de correo registrada.</strong></li>
        </ul>
    </div>
@endif
<div class="card">
    <div class="card-header">
        Mis Inscripciones
    </div>
    <div class="card-body">
        @if (count($inscripciones)>0)
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover table-sm">
                    <thead>
                      <tr>
                        <th scope="col">Acciones</th>
                        <th scope="col">Maestría</th>
                        <th scope="col">Corte</th>
                        <th scope="col">Fecha de inscripción</th>
                      </tr>
                    </thead>
                    <tbody>

                        @foreach ($inscripciones as $inscripcion)

                        @php($inscri=$inscripcion->obtenerInscripcion($inscripcion->inscripcion->id))

                            <tr>
                                <th scope="row">
                                    <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                        <strong>Ok mañana sera otro dia</strong>
                                    </div>
                                </th>
                                <td>
                                    {{ $inscripcion->maestria->nombre }}
                                </td>
                                <td>
                                    {{ $inscripcion->numero }}
                                </td>
                                <td>
                                    {{ $inscripcion->inscripcion->created_at }}
                                    <small>
                                        {{ $inscripcion->inscripcion->created_at->diffForHumans() }}
                                    </small>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
        <div class="alert alert-dark" role="alert">
            <strong>No tiene ninguna inscripción</strong>
        </div>
        @endif
    </div>
</div>



@prepend('linksPie')
    <script>
    $('#menuMisInscripciones').addClass('active');

    </script>
@endprepend

@endsection
