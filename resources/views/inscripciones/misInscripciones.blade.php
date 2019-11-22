@extends('layouts.app',['title'=>'Mis incripciones'])
@section('breadcrumbs', Breadcrumbs::render('misInscripciones'))
@section('content')
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
                        <th scope="col">Número de factura</th>
                        <th scope="col">Estado</th>
                      </tr>
                    </thead>
                    <tbody>
                        
                        @foreach ($inscripciones as $inscripcion)
                        
                        @php($inscri=$inscripcion->obtenerInscripcion($inscripcion->inscripcion->id))
                        
                            <tr>
                                <th scope="row">
                                    <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">

                                        @can('subirComprobante', $inscri)
                                            <a href="{{ route('subirComprobantePago',$inscri->id) }}" class="btn btn-warning"  data-toggle="tooltip" data-placement="top" title="Subir comprobante de pago">
                                                <i class="fas fa-money-check-alt fa-2x"></i>
                                            </a>    
                                        @endcan
                                        @if (Storage::exists($inscri->comprobante))
                                            <button type="button" onclick="verComprobante(this);" data-url="{{ Storage::url($inscri->comprobante) }}" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Ver comprobante de registro">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                        @endif
                                        
                                    </div>
                                </th>
                                <td>
                                    {{ $inscripcion->maestria->nombre }}
                                </td>
                                <td>
                                    Corte {{ $inscripcion->numero }}
                                </td>
                                <td>
                                    {{ $inscripcion->inscripcion->created_at }}
                                </td>
                                <td>
                                    01
                                </td>
                                <td>
                                    <strong>
                                        <ul>
                                            <li class="text-{{ $inscri->estado=='Registro'?'success':'dark' }}">Registro</li>
                                            <li class="text-{{ $inscri->estado=='Subir comprobante de registro'?'success':'dark' }}">

                                                Subir comprobante de registro
                                                @if (Storage::exists($inscri->comprobante))
                                                    <i class="fas fa-check text-success"></i>
                                                @else
                                                    <i class="fas fa-ban text-warning"></i>
                                                @endif
                                            </li>
                                            <li class="text-{{ $inscri->estado=='Aprobado'?'success':'dark' }}">Aprobado</li>
                                        </ul>
                                    </strong>
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

<div class="modal fade bd-example-modal-lg" id="modalComprobanteRegistro" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Comprobante de registro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
            <div class="modal-body">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="" id="comprobanteRegistro" allowfullscreen></iframe>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

@prepend('linksPie')
    <script>
    $('#menuMisInscripciones').addClass('active');  

    function verComprobante(arg){
        $('#modalComprobanteRegistro').modal('show');
        $('#comprobanteRegistro').attr('src',$(arg).data('url'));
    }
    $('#modalComprobanteRegistro').on('hidden.bs.modal', function (e) {
        $('#comprobanteRegistro').attr('src','');
      })
    </script>
@endprepend

@endsection
