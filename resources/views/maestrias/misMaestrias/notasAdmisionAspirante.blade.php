@extends('layouts.app',['title'=>'Bienvenido'])
@section('breadcrumbs', Breadcrumbs::render('notasAdmisionAspirante',$inscripcion))
@section('content')

<div class="card">
    <div class="card-header">
        Admisión de <strong>{{ $inscripcion->user->nombres }} {{ $inscripcion->user->apellidos }}</strong>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-4">

                <h1>Notas</h1>
                <div class="card">
                    <div class="card-header">
                        <h2>Nota de examen</h2>
                        <h1>{{ $admision->examen??'---' }}</h1>
                        
                    </div>
                    <div class="card-body">

                        <h2>Nota de entrevista</h2>
                        <h1>{{ $admision->entrevista??'---' }}</h1>
                        
                    </div>
                    <div class="card-footer">
                        <h2>Nota de ensayo</h2>
                        <form action="{{ route('guardarNotasEnsayoAspirante') }}" method="POST">
                            @csrf
                            <input type="hidden" name="inscripcion" value="{{ $inscripcion->id }}">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Ingrese nota de ensayo<i class="text-danger">*</i></label>
                                <input type="text" name="nota" class="form-control form-control-lg " id="exampleFormControlInput1" placeholder="Ingrese..." value="{{ $admision->ensayo??0 }}">
                            </div>
                            <button type="submit" class="btn btn-success">Actualizar nota de ensayo</button>
                        </form>
                    </div>
                    <div class="card-footer bg bg-dark">
                        <h2>TOTAL</h2>
                        <h1>{{ ($admision->ensayo??0)+($admision->entrevista??0)+($admision->examen??0) }}</h1>
                    </div>
                </div>
                

            </div>
            <div class="col-md-8">
                @if (count($cuestionarios)>0)
                
                <h2>Entrevista</h2>
                <form action="{{ route('guardarNotasAdmisionAspirante') }}" method="POST">
                    @csrf
                    <input type="hidden" name="inscripcion" value="{{ $inscripcion->id }}">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Pregunta</th>
                                <th scope="col">Respuesta</th>
                                <th scope="col">Nota</th>
                            </tr>
                            </thead>
                            <tbody>
                                @php($i=0)
                                @foreach ($cuestionarios as $cues)
                                @php($i++)
                                    <tr>
                                        <th scope="row">
                                            <input type="hidden" name="preguntas[{{ $cues->pregunta->id }}]" value="{{ $cues->pregunta->id }}" required>
                                            {{ $i }}
                                        </th>
                                        <td>
                                            {{ $cues->nombre }} <br>
                                            
                                        </td>
                                        <td>
                                            <select class="form-control @error('opcion.'.$cues->pregunta->id) is-invalid @enderror" id="" name="opcion[{{ $cues->pregunta->id }}]" required >
                                                <option value="">Selecione respuesta</option>
                                                <option {{ $cues->pregunta->opcion=='Excelente'?'selected':'' }} value="Excelente">Excelente</option>
                                                <option {{ $cues->pregunta->opcion=='Muy bueno'?'selected':'' }} value="Muy bueno">Muy bueno</option>
                                                <option {{ $cues->pregunta->opcion=='Bueno'?'selected':'' }} value="Bueno">Bueno</option>
                                                <option {{ $cues->pregunta->opcion=='Regular'?'selected':'' }} value="Regular">Regular</option>
                                                <option {{ $cues->pregunta->opcion=='Pobre'?'selected':'' }} value="Pobre">Pobre</option>
                                            </select>
                                        </td>
                                        <td>
                                            {{ $cues->pregunta->nota }}
                                        </td>
                                    </tr>      
                                @endforeach
                            
                            
                            </tbody>
                        </table>
                    </div>
                    <button type="submit" class="btn btn-primary mt-2 btn-lg">Guardar entrevista</button>
                </form>

                @else
                    <div class="alert alert-dark" role="alert">
                        <strong>No existe preguntas para aplicar la entrevista</strong>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

@prepend('linksPie')
    <script>
    $('#menuMisMaestria').addClass('active');  
    </script>
@endprepend

@endsection
