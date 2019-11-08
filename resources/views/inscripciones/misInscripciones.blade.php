@extends('layouts.app')

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
                        <th scope="col">Fecha de inscripción</th>
                        <th scope="col">Estado</th>
                      </tr>
                    </thead>
                    <tbody>
                        
                        @foreach ($inscripciones as $inscripcion)
                        
                        @php($inscri=$inscripcion->obtenerInscripcion($inscripcion->inscripcion->id))
                        
                            <tr>
                                <th scope="row">
                                    <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">

                                        <a href="{{ route('verMiInscripcion',$inscri->id) }}" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Ver documento de inscripción">
                                            <i class="fas fa-file-alt fa-2x"></i>
                                        </a>

                                        @can('subirComprobante', $inscri)
                                            <a href="{{ route('subirComprobantePago',$inscri->id) }}" class="btn btn-warning"  data-toggle="tooltip" data-placement="top" title="Subir comprobante de pago">
                                                <i class="fas fa-money-check-alt fa-2x"></i>
                                            </a>    
                                        @endcan
                                        
                                    </div>
                                </th>
                                <td>
                                    {{ $inscripcion->nombre }}
                                </td>
                                <td>
                                    {{ $inscripcion->inscripcion->created_at }}
                                </td>
                                <td>
                                    <strong>
                                        <ul>
                                            <li class="text-{{ $inscri->estado=='Inscrito'?'success':'dark' }}">Inscrito</li>
                                            <li class="text-{{ $inscri->estado=='Subir comprobante de pago'?'warning':'dark' }}">

                                                Subir comprobante de pago  
                                                @if (Storage::exists($inscri->comprobante))
                                                    <i class="fas fa-check text-success"></i>
                                                @else
                                                    <i class="fas fa-ban text-warning"></i>
                                                @endif
                                            </li>
                                            <li class="text-{{ $inscripcion->inscripcion->estado=='Aprobado'?'success':'dark' }}">Aprobado</li>
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
            <strong>No tiene ninguna isncripciones</strong>
        </div>
        @endif
    </div>
    <div class="card-footer text-muted">
        Footer
    </div>
</div>

@prepend('linksPie')
    <script>
    $('#menuMisInscripciones').addClass('active');  
    </script>
@endprepend

@endsection
