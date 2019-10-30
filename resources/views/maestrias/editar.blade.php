@extends('layouts.app',['title'=>'editar de maestría'])

@section('breadcrumbs', Breadcrumbs::render('editarMaestria',$maestria))

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Editar Maestría</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{-- inicio del formulario --}}
                    <form action="{{ route('actualizarMaestria') }}" method="POST">
                        @csrf
                        <input type="hidden" class="form-control @error('maestria') is-invalid @enderror" value="{{ old('id',$maestria->id) }}" name="maestria" id="nombre" required placeholder="Maestría en desarrollo local">
                                                          
                        <div class="form-group">
                            <label for="nombre">Nombre de la Maestría :</label>
                            <input type="text" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre',$maestria->nombre) }}" name="nombre" id="nombre" required placeholder="Maestría en desarrollo local">
                            @error('nombre')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="tipoPrograma">Tipo Programa</label>
                                <input type="text" class="form-control @error('tipoPrograma') is-invalid @enderror" value="{{ old('tipoPrograma',$maestria->tipoPrograma) }}" name="tipoPrograma" id="tipoPrograma" required placeholder="Maestría Profesional">
                                @error('tipoPrograma')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="campoAmplio">Campo Amplio</label>
                                <input type="text" class="form-control @error('campoAmplio') is-invalid @enderror" value="{{ old('campoAmplio',$maestria->campoAmplio) }}" name="campoAmplio" id="campoAmplio" required placeholder="03.Ciencias Sociales,Periodisnmo">
                                @error('campoAmplio')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="campoEspecifico">Campo Específico</label>
                                <input type="text" class="form-control @error('campoEspecifico') is-invalid @enderror" value="{{ old('campoEspecifico',$maestria->campoEspecifico) }}" name="campoEspecifico" id="campoEspecifico" required placeholder="0-31 Ciencias Sociales">
                                @error('campoEspecifico')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="campoDetallado">Campo Detallado</label>
                                <input type="text" class="form-control @error('campoDetallado') is-invalid @enderror" value="{{ old('campoDetallado',$maestria->campoDetallado) }}" name="campoDetallado" id="campoDetallado" required placeholder="0312-Ciencias Políticas">
                                @error('campoDetallado')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="programa">Programa</label>
                                <input type="text" class="form-control @error('programa') is-invalid @enderror" value="{{ old('programa',$maestria->programa) }}" name="programa" id="programa" required placeholder="C-Desarrollo local">
                                @error('programa')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="titulo">Titulo</label>
                                <input type="text" class="form-control @error('titulo') is-invalid @enderror" value="{{ old('titulo',$maestria->titulo) }}" name="titulo" id="titulo" required placeholder="Magister en desarrollo local">
                                @error('titulo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="codificacionPrograma">Codificación Programa</label>
                                <input type="text" class="form-control @error('codificacionPrograma') is-invalid @enderror" value="{{ old('codificacionPrograma',$maestria->codificacionPrograma) }}" name="codificacionPrograma" id="codificacionPrograma" required placeholder="750312C04">
                                @error('codificacionPrograma')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="lugarEjecucion">Lugar de Ejecución</label>
                                <textarea class="form-control @error('lugarEjecucion') is-invalid @enderror"  name="lugarEjecucion" id="lugarEjecucion" required placeholder="Latacunga" >{{ old('lugarEjecucion',$maestria->lugarEjecucion) }}</textarea>
                                @error('lugarEjecucion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="duracion">Duración</label>
                                <input type="text" class="form-control @error('duracion') is-invalid @enderror" value="{{ old('duracion',$maestria->duracion) }}" name="duracion" id="duracion" required placeholder="4 semestres">
                                @error('duracion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="tipoPeriodo">Tipo de Periodo</label>
                                <input type="text" class="form-control @error('tipoPeriodo') is-invalid @enderror" value="{{ old('tipoPeriodo',$maestria->tipoPeriodo) }}" name="tipoPeriodo" id="tipoPeriodo" required placeholder="Semestral">
                                @error('tipoPeriodo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="numeroHoras">Número de horas</label>
                                <input type="number" class="form-control @error('numeroHoras') is-invalid @enderror" value="{{ old('numeroHoras',$maestria->numeroHoras) }}" name="numeroHoras" id="numeroHoras" required placeholder="2.145">
                                @error('numeroHoras')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="resolucion">Resolución</label>
                                <input type="text" class="form-control @error('resolucion') is-invalid @enderror" value="{{ old('resolucion',$maestria->resolucion) }}" name="resolucion" id="resolucion" required placeholder="RPC-SO-35-N°">
                                @error('resolucion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-3">
                                <label for="fechaResolucion">Fecha de Resolución</label>
                                <input type="date" class="form-control @error('fechaResolucion') is-invalid @enderror" value="{{ old('fechaResolucion',$maestria->fechaResolucion) }}" name="fechaResolucion" id="fechaResolucion" required placeholder="Semestral">
                                @error('fechaResolucion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-3">
                                <label for="modalidad">Modalidad</label>
                                <input type="text" class="form-control @error('modalidad') is-invalid @enderror" value="{{ old('modalidad',$maestria->modalidad) }}" name="modalidad" id="modalidad" required placeholder="Presencial">
                                @error('modalidad')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-3">
                                <label for="vigencia">Vigencia</label>
                                <input type="text" class="form-control @error('vigencia') is-invalid @enderror" value="{{ old('vigencia',$maestria->vigencia) }}" name="vigencia" id="vigencia" required placeholder="5 años">
                                @error('vigencia')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="paralelos">Paralelos</label>
                                <input type="number" class="form-control @error('paralelos') is-invalid @enderror" value="{{ old('paralelos',$maestria->paralelos) }}" name="paralelos" id="paralelos" required placeholder="2">
                                @error('paralelos')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="capacidadParalelo">Capacidad por Paralelos</label>
                                <input type="number" class="form-control @error('capacidadParalelo') is-invalid @enderror" value="{{ old('capacidadParalelo',$maestria->capacidadParalelo) }}" name="capacidadParalelo" id="capacidadParalelo" required placeholder="30">
                                @error('capacidadParalelo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="fechaAprobacion">Fecha de Aprobación</label>
                                <input type="date" class="form-control @error('fechaAprobacion') is-invalid @enderror" value="{{ old('fechaAprobacion',$maestria->fechaAprobacion) }}" name="fechaAprobacion" id="fechaAprobacion" required placeholder="Semestral">
                                @error('fechaAprobacion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>                      
                        
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        </form>
                 {{-- fin del formulario  --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection