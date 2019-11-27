@extends('layouts.app',['title'=>'Nueva cohorte'])


@section('breadcrumbs', Breadcrumbs::render('editarCorte',$corte))


@section('content')


<form action="{{ route('actualizarCorte') }}" method="POST">
    @csrf
    <input type="hidden" name="corte" value="{{ $corte->id }}" required>
    <div class="card">
        <div class="card-header">
            Editar cohorte
        </div>
        <div class="card-body">
            <h1>Número de cohorte: <strong>{{ $corte->numero }}</strong></h1>
            
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="valorRegistro">Valor del registro:<i class="text-danger">*</i></label>
                    <input type="text" class="form-control @error('valorRegistro') is-invalid @enderror" value="{{ old('valorRegistro',$corte->valorRegistro) }}" name="valorRegistro" id="valorRegistro" required placeholder="0.00">
                    @error('valorRegistro')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-md-4">
                    <label for="valorMatricula">Valor de la maestría:<i class="text-danger">*</i></label>
                    <input type="text" class="form-control @error('valorMatricula') is-invalid @enderror" value="{{ old('valorMatricula',$corte->valorMatricula) }}" name="valorMatricula" id="valorMatricula" required placeholder="0.00">
                    @error('valorMatricula')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-md-4">
                    <label for="valorColegiatura">Valor de la colegiatura:<i class="text-danger">*</i></label>
                    <input type="text" class="form-control @error('valorColegiatura') is-invalid @enderror" value="{{ old('valorColegiatura',$corte->valorColegiatura) }}" name="valorColegiatura" id="valorColegiatura" required placeholder="0.00">
                    @error('valorColegiatura')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row border">
                <label for="" class="col-sm-2 col-form-label">Presentación de documentos<i class="text-danger">*</i></label>
                <div class="col-sm-5 mt-1 mb-1">
                    <div class="form-group">
                        <label for="fechaInicioDocumentos">Fecha de inicio</label>
                        <input type="date" name="fechaInicioDocumentos" id="fechaInicioDocumentos" value="{{ old('fechaInicioDocumentos',$corte->fechaInicioDocumentos) }}" class="form-control @error('fechaInicioDocumentos') is-invalid @enderror"  required>
                        @error('fechaInicioDocumentos')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-5 mt-1 mb-1">
                     
                        <div class="form-group">
                            <label for="fechaFinDocumentos">Fecha de fin</label>
                            <input type="date" name="fechaFinDocumentos" id="fechaFinDocumentos" value="{{ old('fechaFinDocumentos',$corte->fechaFinDocumentos) }}" class="form-control @error('fechaFinDocumentos') is-invalid @enderror"  required>
                            @error('fechaFinDocumentos')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
            </div>


            <div class="form-group row border">
                <label for="" class="col-sm-2 col-form-label">Examén de admisión<i class="text-danger">*</i></label>
                <div class="col-sm-5 mt-1 mb-1">
                    <div class="form-group">
                        <label for="fechaAdmision">Fecha</label>
                        <input type="date" name="fechaAdmision" id="fechaAdmision" value="{{ old('fechaAdmision',$corte->fechaAdmision) }}" class="form-control @error('fechaAdmision') is-invalid @enderror"  required>
                        @error('fechaAdmision')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-5 mt-1 mb-1">
                    
                    <div class="form-group">
                        <label for="horaAdmision">Hora</label>
                        <input type="time" name="horaAdmision" id="horaAdmision" value="{{ old('horaAdmision',$corte->horaAdmision) }}" class="form-control @error('horaAdmision') is-invalid @enderror"  required>
                        @error('horaAdmision')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

            
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="entrevistaEnsayo">Entrevista y ensayo:<i class="text-danger">*</i></label>
                    <input type="date" class="form-control @error('entrevistaEnsayo') is-invalid @enderror" value="{{ old('entrevistaEnsayo',$corte->entrevistaEnsayo) }}" name="entrevistaEnsayo" id="entrevistaEnsayo" required>
                    @error('entrevistaEnsayo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-md-4">
                    <label for="presentacionInformes">Presentación informes:<i class="text-danger">*</i></label>
                    <input type="date" class="form-control @error('presentacionInformes') is-invalid @enderror" value="{{ old('presentacionInformes',$corte->presentacionInformes) }}" name="presentacionInformes" id="presentacionInformes" required>
                    @error('presentacionInformes')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-md-4">
                    <label for="resolucionProcesoAdmitidos">Resolución proceso de admisión:<i class="text-danger">*</i></label>
                    <input type="date" class="form-control @error('resolucionProcesoAdmitidos') is-invalid @enderror" value="{{ old('resolucionProcesoAdmitidos',$corte->resolucionProcesoAdmitidos) }}" name="resolucionProcesoAdmitidos" id="resolucionProcesoAdmitidos" required>
                    @error('resolucionProcesoAdmitidos')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="publicacionAdmitidos">Publicación de admitidos:<i class="text-danger">*</i></label>
                    <input type="date" class="form-control @error('publicacionAdmitidos') is-invalid @enderror" value="{{ old('publicacionAdmitidos',$corte->publicacionAdmitidos) }}" name="publicacionAdmitidos" id="publicacionAdmitidos" required>
                    @error('publicacionAdmitidos')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="inicioClases">Inicio de clases:<i class="text-danger">*</i></label>
                    <input type="date" class="form-control @error('inicioClases') is-invalid @enderror" value="{{ old('inicioClases',$corte->inicioClases) }}" name="inicioClases" id="inicioClases" required>
                    @error('inicioClases')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row border">
                <label for="" class="col-sm-2 col-form-label">Período de matrícula<i class="text-danger">*</i></label>
                <div class="col-sm-5 mt-1 mb-1">
                    <div class="form-group">
                        <label for="fechaInicioMatricula">Fecha de inicio</label>
                        <input type="date" name="fechaInicioMatricula" id="fechaInicioMatricula" value="{{ old('fechaInicioMatricula',$corte->fechaInicioMatricula) }}" class="form-control @error('fechaInicioMatricula') is-invalid @enderror"  required>
                        @error('fechaInicioMatricula')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-5 mt-1 mb-1">
                    
                    <div class="form-group">
                        <label for="fechaFinMatricula">Fecha de fin</label>
                        <input type="date" name="fechaFinMatricula" id="fechaFinMatricula" value="{{ old('fechaFinMatricula',$corte->fechaFinMatricula) }}" class="form-control @error('fechaFinMatricula') is-invalid @enderror"  required>
                        @error('fechaFinMatricula')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
            
        </div>
        <div class="card-footer text-muted">
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </div>
</form>

@push('linksCabeza')

@endpush

@prepend('linksPie')

@endprepend

@endsection

