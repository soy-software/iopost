@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Nueva Maestría </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{-- inicio del formulario --}}
                    <form action="" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nombre">Nombre de la Maestría :</label>
                            <input type="text" class="form-control" id="nombre" placeholder="Maestría en desarrollo local">
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="tipoProyecto">Tipo Programa</label>
                                <input type="text" class="form-control" name="tipoProyecto" id="tipoProyecto" placeholder="Maestría Profesional">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="campoAmplio">Campo Amplio</label>
                                <input type="text" class="form-control" name="campoAmplio" id="campoAmplio" placeholder="03.Ciencias Sociales,Periodisnmo">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="campoEspecifico">Campo Específico</label>
                                <input type="text" class="form-control" name="campoEspecifico" id="campoEspecifico" placeholder="0-31 Ciencias Sociales">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="campoDetallado">Campo Detallado</label>
                                <input type="text" class="form-control" name="campoDetallado" id="campoDetallado" placeholder="0312-Ciencias Políticas">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="programa">Programa</label>
                                <input type="text" class="form-control" name="programa" id="programa" placeholder="C-Desarrollo local">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="titulo">Titulo</label>
                                <input type="text" class="form-control" name="titulo" id="titulo" placeholder="Magister en desarrollo local">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="CodificacionPrograma">Codificación Programa</label>
                                <input type="text" class="form-control" name="CodificacionPrograma" id="CodificacionPrograma" placeholder="750312C04">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="lugarEjecucion">Lugar de Ejecución</label>
                                <textarea class="form-control" name="lugarEjecucion" id="lugarEjecucion" placeholder="Latacunga" ></textarea>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="duracion">Duración</label>
                                <input type="text" class="form-control" name="duracion" id="duracion" placeholder="4 semestres">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="tipoPeriodo">Tipo de Periodo</label>
                                <input type="text" class="form-control" name="tipoPeriodo" id="tipoPeriodo" placeholder="Semestral">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="numeroHoras">Número de horas</label>
                                <input type="number" class="form-control" name="numeroHoras" id="numeroHoras" placeholder="2.145">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="resolucion">Resolución</label>
                                <input type="text" class="form-control" name="resolucion" id="resolucion" placeholder="RPC-SO-35-N°">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="fechaResolucion">Fecha de Resolución</label>
                                <input type="date" class="form-control" name="fechaResolucion" id="fechaResolucion" placeholder="Semestral">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="modalidad">Modalidad</label>
                                <input type="text" class="form-control" name="modalidad" id="modalidad" placeholder="Presencial">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="paralelos">Paralelos</label>
                                <input type="number" class="form-control" name="paralelos" id="paralelos" placeholder="2">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="capacidadParalelos">Capacidad por Paralelos</label>
                                <input type="number" class="form-control" name="capacidadParalelos" id="capacidadParalelos" placeholder="30">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="fechaAprobacion">Fecha de Aprobación</label>
                                <input type="date" class="form-control" name="fechaAprobacion" id="fechaAprobacion" placeholder="Semestral">
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
<script>

</script>
