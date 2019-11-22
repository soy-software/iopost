@extends('layouts.app',['title'=>'Actualizar registro académico'])

@section('breadcrumbs', Breadcrumbs::render('actualizarMiRegistroAcademico',$ra))
@section('content')

<form action="{{ route('actualizarMiRegistroAcademico') }}" method="POST">
    @csrf
    <input type="hidden" name="ra" value="{{ $ra->id }}" required>
    <div class="card">
        <div class="card-header">
            Actualizar {{ $ra->institucion_pregrado }}
        </div>
        <div class="card-body">
                <div class="form-row">
                            
                    <div class="form-group col-md-4">
                        <label for="institucion_pregrado">Institución<i class="text-danger">*</i></label>
                        <input type="text" class="form-control @error('institucion_pregrado') is-invalid @enderror" id="institucion_pregrado" name="institucion_pregrado" value="{{ old('institucion_pregrado',$ra->institucion_pregrado) }}" placeholder="Ingrese institución..." required>
                        @error('institucion_pregrado')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label for="nivel">Nivel de formación<i class="text-danger">*</i></label>
                        <select id="nivel" class="form-control @error('nivel') is-invalid @enderror" name="nivel" required>

                            <option value="TÉCNOLOGICO SUPERIOR" {{ old('nivel')=='TÉCNOLOGICO SUPERIOR'?'selected':'' }}>TÉCNOLOGICO SUPERIOR</option>
                            <option value="LICENCIATURA" {{ old('nivel',$ra->nivel)=='LICENCIATURA'?'selected':'' }}>LICENCIATURA</option>
                            <option value="TERCER NIVEL" {{ old('nivel',$ra->nivel)=='TERCER NIVEL'?'selected':'' }}>TERCER NIVEL</option>    
                            <option value="CUARTO NIVEL" {{ old('nivel',$ra->nivel)=='CUARTO NIVEL'?'selected':'' }}>CUARTO NIVEL</option>    
                            <option value="DOCTORADO" {{ old('nivel',$ra->nivel)=='DOCTORADO'?'selected':'' }}>DOCTORADO</option>    

                            </select>
                        @error('nivel')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label for="tipo_pregrado">Tipo de universidad<i class="text-danger">*</i> </label>
                        <select id="tipo_pregrado" class="form-control @error('tipo_pregrado') is-invalid @enderror" name="tipo_pregrado" required>
                            
                            <option value="PÚBLICA" {{ old('tipo_pregrado',$ra->tipo_pregrado)=='PÚBLICA'?'selected':'' }}>PÚBLICA</option>
                            <option value="PRIVADA" {{ old('tipo_pregrado',$ra->tipo_pregrado)=='PRIVADA'?'selected':'' }}>PRIVADA</option>
                            <option value="MIXTA" {{ old('tipo_pregrado',$ra->tipo_pregrado)=='MIXTA'?'selected':'' }}>MIXTA</option>
                            
                        </select>
                        @error('tipo_pregrado')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
    
                <div class="form-row">    
                    <div class="form-group col-md-6">
                        <label for="titulo_pregrado">Título<i class="text-danger">*</i></label>
                        <input type="text" class="form-control @error('titulo_pregrado') is-invalid @enderror" id="titulo_pregrado" name="titulo_pregrado" value="{{ old('titulo_pregrado',$ra->titulo_pregrado) }}" placeholder="Ingrese título de pregrado..." required>
                        @error('titulo_pregrado')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="especialidad_pregrado">Especialidad<i class="text-danger">*</i></label>
                        <input type="text" class="form-control @error('especialidad_pregrado') is-invalid @enderror" id="especialidad_pregrado" name="especialidad_pregrado" value="{{ old('especialidad_pregrado',$ra->especialidad_pregrado) }}" placeholder="Ingrese especialidad de pregrado..." required>
                        @error('especialidad_pregrado')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
    
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="duracion_pregrado">Duración (años)</label>
                        <input type="number" class="form-control @error('duracion_pregrado') is-invalid @enderror" id="duracion_pregrado" name="duracion_pregrado" value="{{ old('duracion_pregrado',$ra->duracion_pregrado) }}" placeholder="Ingrese duración pregrado...">
                        @error('duracion_pregrado')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label for="fecha_graduacion_pregrado">Fecha de graduación</label>
                        <input type="date" class="form-control @error('fecha_graduacion_pregrado') is-invalid @enderror" id="fecha_graduacion_pregrado" name="fecha_graduacion_pregrado" value="{{ old('fecha_graduacion_pregrado',$ra->fecha_graduacion_pregrado) }}" placeholder="Ingrese fecha graduación de pregrado...">
                        @error('fecha_graduacion_pregrado')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label for="calificacion_grado_pregrado">Calificación de grado</label>
                        <input type="text" class="form-control @error('calificacion_grado_pregrado') is-invalid @enderror" id="calificacion_grado_pregrado" name="calificacion_grado_pregrado" value="{{ old('calificacion_grado_pregrado',$ra->calificacion_grado_pregrado) }}" placeholder="Ingrese fecha graduación de pregrado...">
                        @error('calificacion_grado_pregrado')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="pais_pregrado">País</label>
                        <input type="text" class="form-control @error('pais_pregrado') is-invalid @enderror" id="pais_pregrado" name="pais_pregrado" value="{{ old('pais_pregrado',$ra->pais_pregrado) }}" placeholder="Ingrese país...">
                        @error('pais_pregrado')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label for="provincia_pregrado">Provincia</label>
                        <input type="text" class="form-control @error('provincia_pregrado') is-invalid @enderror" id="provincia_pregrado" name="provincia_pregrado" value="{{ old('provincia_pregrado',$ra->provincia_pregrado) }}" placeholder="Ingrese provincia...">
                        @error('provincia_pregrado')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label for="canton_pregrado">Cantón</label>
                        <input type="text" class="form-control @error('canton_pregrado') is-invalid @enderror" id="canton_pregrado" name="canton_pregrado" value="{{ old('canton_pregrado',$ra->canton_pregrado) }}" placeholder="Ingrese cantón...">
                        @error('canton_pregrado')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
        </div>
        <div class="card-footer text-muted">
            <button type="submit" class="btn btn-primary">
                Actualizar registro académico
            </button>
        </div>
    </div>
</form>
@prepend('linksPie')
    <script>
    $('#menuEmail').addClass('active');  
    </script>
@endprepend

@endsection
