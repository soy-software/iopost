@extends('layouts.app',['title'=>'Notas de examen de evaluación'])
@section('breadcrumbs', Breadcrumbs::render('notasExamenAdmision',$cohorte))


@section('barraLateral')
@if (count($inscritos)>0)
<div class="breadcrumb justify-content-center">
    
    <a href="{{ route('importarNotasExamenAdmision',$cohorte) }}" class="breadcrumb-elements-item" data-toggle="tooltip" data-placement="top" title="Importar notas de examen de admisíon">
        <i class="fas fa-file-excel"></i>
        Importar notas
    </a>
    <a href="{{ route('descargarNotasPdfInscritos',$cohorte) }}" target="_blank" class="breadcrumb-elements-item" data-toggle="tooltip" data-placement="top" title="Descargar notas de admisíon a PDF">
        <i class="fas fa-file-pdf"></i>
        Descargar a PDF
    </a>
</div>
@endif
@endsection


@section('content')

@if (count($inscritos)>0)

<form action="{{ route('actualizarExamenAdmision') }}" method="POST">
    @csrf
    <input type="hidden" name="cohorte" value="{{ $cohorte->id }}">
    <div class="card">
        <div class="card-header">
            Listado de registros
        </div>
        <div class="card-body">
            
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Aspirante</th>
                            <th scope="col">Identificación</th>
                            <th scope="col">Email</th>
                            <th scope="col">Estado</th>
                            <th scope="col" class="bg-secondary">Nota de examen</th>
                            <th scope="col" class="bg-dark">Nota de entrevista</th>
                            <th scope="col" class="bg-primary">Nota de ensayo</th>
                            <th scope="col" class="bg-success">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                
                        @php($i=0)
                        @foreach ($inscritos as $inscrito)
                        @php($i++)
                            <tr>
                                <td>
                                    {{ $i }}
                                </td>
                                <td>
                                    {{ $inscrito->user->primer_nombre }} {{ $inscrito->user->segundo_nombre }} {{ $inscrito->user->primer_apellido }} {{ $inscrito->user->segundo_apellido }}
                                </td>
                                <td>
                                    {{ $inscrito->user->identificacion }}
                                </td>
                                <td>
                                    {{ $inscrito->user->email }}
                                </td>
                                <td>
                                    {{ $inscrito->estado }}
                                </td>
                                <td>
                                    
                                    <input type="hidden" name="inscripciones[{{ $inscrito->id }}]" value="{{ $inscrito->id }}">
                                    <input type="text" name="notas[{{ $inscrito->id }}]" class="form-control @error('notas.'.$inscrito->id) is-invalid  @enderror" value="{{ old('notas.'.$inscrito->id,$inscrito->admision->examen??'0.00') }}" id="" placeholder="Ingrese nota">
                                </td>
                                <td>
                                    {{ $inscrito->admision->entrevista??'' }}
                                </td>
                                <td>
                                    {{ $inscrito->admision->ensayo??'' }}
                                </td>
                                <td>
                                    {{ ($inscrito->admision->examen??0)+($inscrito->admision->entrevista??0)+($inscrito->admision->ensayo??0) }}
                                </td>
                            </tr>
                        @endforeach
                
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer text-muted">
            @can('ingresarNotaExamen', $cohorte)
                <button type="submit" class="btn btn-primary">
                    Actualizar notas
                </button>
            @else
            <button disabled class="btn btn-danger"> No puede actualizar notas en cohorte estado:{{ $cohorte->estado }}</button>    
            @endcan
            
        </div>
    </div>
</form>

@else
    <div class="alert alert-dark" role="alert">
        <strong>No existe registro en esta cohorte</strong>
    </div>
@endif



@prepend('linksPie')
    <script>
    $('#menuMaestria').addClass('active');  
    </script>
@endprepend

@endsection
