@extends('layouts.app',['title'=>'Inscripciones en corte'])
@section('breadcrumbs', Breadcrumbs::render('inscritosEnCorteMiMaestrias',$corte))
@section('content')

<div class="card">
    <div class="card-header">
        Inscripciones en corte {{ $corte->numero }}
    </div>
    <div class="card-body">
        @if (count($inscripciones)>0)
        <a href="{{ route('descargarExcelInscritos',$corte->id) }}" class="btn btn-dark float-right mb-1" data-toggle="tooltip" data-placement="top" title="Descargar inscritos a Excel">
            <i class="fas fa-file-excel"></i>
        </a>
        <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Acciones</th>
                        <th scope="col">#</th>
                        <th scope="col">Nombres</th>
                        <th scope="col">Apellidos</th>
                        <th scope="col">Identificación</th>
                        <th scope="col">Email</th>
                        <th scope="col">Celular</th>
                        <th scope="col">Estado</th>
                    </tr>
                </thead>
                <tbody>
                    @php($i=0)
                    @foreach ($inscripciones as $inscripcion)
                    @php($i++)
                        <tr>
                            <th scope="row">
                                <div class="btn-group btn-group-sm" role="group" aria-label="...">
                                    <a href="{{ route('informacionAspirante',$inscripcion->id) }}" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Información de {{ $inscripcion->user->nombres }} {{ $inscripcion->user->apellidos }}">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                </div>
                            </th>
                            <th>
                                {{ $i }}
                            </th>
                            <td>
                                {{ $inscripcion->user->nombres }}
                            </td>
                            <td>
                                {{ $inscripcion->user->apellidos }}
                            </td>
                            <td>
                                {{ $inscripcion->user->identificacion }}
                            </td>
                            <td>
                                {{ $inscripcion->user->email }}
                            </td>
                            <td>
                                {{ $inscripcion->user->celular }}
                            </td>
                            <td>
                                {{ $inscripcion->estado }}
                            </td>
                        </tr>      
                    @endforeach
                    
                </tbody>
            </table>

        @else
            <div class="alert alert-dark" role="alert">
                <strong>Está corte no tiene inscripciones</strong>
            </div>
        @endif
    </div>
</div>

@prepend('linksPie')
    <script>
    $('#menuMisMaestria').addClass('active');  
    </script>
@endprepend

@endsection
