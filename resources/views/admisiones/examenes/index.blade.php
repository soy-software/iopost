@extends('layouts.app',['title'=>'Notas de examen de evaluación'])
@section('breadcrumbs', Breadcrumbs::render('notasExamenAdmision',$cohorte))
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
                        <th scope="col">Aspirante</th>
                        <th scope="col">Identificación</th>
                        <th scope="col">Email</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Nota</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($inscritos as $inscrito)
                        <tr>
                            <th scope="row">
                                {{ $inscrito->user->nombres }} {{ $inscrito->user->apellidos }}
                            </th>
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
    $('#menuHome').addClass('active');  
    </script>
@endprepend

@endsection
