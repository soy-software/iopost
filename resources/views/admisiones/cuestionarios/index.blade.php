@extends('layouts.app',['title'=>'Cuestionario'])
@section('breadcrumbs', Breadcrumbs::render('cuestionario',$cohorte))
@section('content')
<div class="card">
   
    <div class="card-header">
        @can('crearCuestionario', $cohorte)
            <form action="{{ route('guardarPreguntaCuestionario') }}" method="POST">
                @csrf
                <input type="hidden" name="cohorte" value="{{ $cohorte->id }}">
                <label for="pregunta">Ingresar pregunta<i class="text-danger">*</i></label>
                <div class="input-group mb-3">
                    <input type="text" name="pregunta" class="form-control" placeholder="Ingrese pregunta..?" aria-label="Pregunta" aria-describedby="button-addon2" required>
                    <div class="input-group-append">
                        <button class="btn btn-dark" type="submit" id="button-addon2">
                            Ingresar nueva pregunta
                        </button>
                    </div>
                </div>
            </form>

        @else 
            <div class="alert alert-dark" role="alert">
                No puedes crear cuestionario en estado <strong>{{ $cohorte->estado }} </strong>de cohorte, y no más de 10 preguntas
            </div>
        @endcan
        </div> 
    

    <div class="card-body">
        @if (count($cuestionarios)>0)
            <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Acción</th>
                                <th scope="col">#</th>
                                <th scope="col">Pregunta</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($i=0)
                            @foreach ($cuestionarios as $cues)
                            @php($i++)
                                <tr>

                                    <th scope="row">
                                        <button type="button" onclick="eliminar(this);" data-url="{{ route('eliminarCuestionario',$cues->id) }}"  class="btn btn-danger" data-toggle="tooltip" data-placement="top" data-title="Eliminar {{ $cues->nombre }}">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>   
                                    </th>
                                    <td>
                                        {{ $i }}
                                    </td>
                                    <td>
                                        {{ $cues->nombre }}
                                    </td>
                                </tr>    
                            @endforeach
                            
                        </tbody>
                    </table>
            </div>
        @else
            <div class="alert alert-dark" role="alert">
                <strong>Cuestionario sin preguntas.</strong>
            </div>
        @endif
    </div>
</div>

@prepend('linksPie')
    <script>
    $('#menuMaestria').addClass('active');  
    </script>
@endprepend

@endsection
