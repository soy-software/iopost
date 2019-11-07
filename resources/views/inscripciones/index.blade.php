@extends('layouts.app',['title'=>'Inscripción en línea'])

@section('breadcrumbs', Breadcrumbs::render('incripcion',$corte))

@section('content')
@if ($corte->estado=='Inscripciones')
    
    <div class="card">
        <div class="card-header">
            Inscribir en: <strong>{{ $corte->maestria->nombre }}</strong>

            
        </div>
        <div class="card-body">
            <form id="example-form" action="{{ route('procesarInscripcion') }}" method="POST">
                @csrf
                <input type="hidden" name="corte" value="{{ $corte->id }}" required>
                <div>
                    <h3>Datos personales</h3>
                    <section>
                        <div class="card-body">
            
                            
                            <div class="form-group">
                                <label for="email">Email<i class="text-danger">*</i></label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="Ingrese email..." required>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                                
                            
                
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="nombres">Nombres<i class="text-danger">*</i></label>
                                    <input type="text" class="form-control @error('nombres') is-invalid @enderror" id="nombres" name="nombres" value="{{ old('nombres') }}" placeholder="Ingrese nombres.." required>
                                    @error('nombres')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="apellidos">Apellidos<i class="text-danger">*</i></label>
                                    <input type="text" class="form-control @error('apellidos') is-invalid @enderror" id="apellidos" name="apellidos" value="{{ old('apellidos') }}" placeholder="Ingrese apellidos..." required>
                                    @error('apellidos')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                
                
                            <div class="form-row">
                                
                                <div class="form-group col-md-3">
                                    <label for="tipo_identificacion">Tipo de identificación<i class="text-danger">*</i></label>
                                    <select id="tipo_identificacion" class="form-control @error('tipo_identificacion') is-invalid @enderror" name="tipo_identificacion" required>
                                        <option value="Cédula" {{ old('tipo_identificacion')=='Cédula'?'selected':'' }}>Cédula</option>
                                        <option value="Ruc persona Natural" {{ old('tipo_identificacion')=='Ruc persona Natural'?'selected':'' }}>Ruc persona Natural</option>
                                        <option value="Ruc Sociedad Pública" {{ old('tipo_identificacion')=='Ruc Sociedad Pública'?'selected':'' }}>Ruc Sociedad Pública</option>
                                        <option value="Ruc Sociedad Privada" {{ old('tipo_identificacion')=='Ruc Sociedad Privada'?'selected':'' }}>Ruc Sociedad Privada</option>
                                        <option value="Pasaporte" {{ old('tipo_identificacion')=='Pasaporte'?'selected':'' }}>Pasaporte</option>
                                        <option value="Otros" {{ old('tipo_identificacion')=='Otros'?'selected':'' }}>Otros</option>
                                        
                                    </select>
                                    @error('tipo_identificacion')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="identificacion">Identificación<i class="text-danger">*</i></label>
                                    <input type="text" class="form-control @error('identificacion') is-invalid @enderror" id="identificacion" name="identificacion" value="{{ old('identificacion') }}" required placeholder="Ingrese identificación...">
                                    @error('identificacion')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="fecha_nacimiento">Fecha de nacimiento</label>
                                    <input type="date" class="form-control @error('fecha_nacimiento') is-invalid @enderror" id="fecha_nacimiento" name="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}" required placeholder="Fecha de nacimiento...">
                                    @error('fecha_nacimiento')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="">Sexo<i class="text-danger">*</i></label>
                                    <div class="form-check form-check-inline ml-2">
                                        <input class="form-check-input @error('sexo') is-invalid @enderror" type="radio" name="sexo" id="sexo_hombre" value="Masculino" {{ old('sexo')=='Masculino'?'checked':'checked' }}>
                                        <label class="form-check-label" for="sexo_hombre">Masculino</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="sexo" id="sexo_mujer" value="Femenino" {{ old('sexo')=='Femenino'?'checked':'' }}>
                                        <label class="form-check-label" for="sexo_mujer">Femenino</label>
                                    </div>
                                    @error('sexo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                
                            <div class="form-row">
                                
                                <div class="form-group col-md-3">
                                    <label for="estado_civil">Estado civil<i class="text-danger">*</i></label>
                                    <select id="estado_civil" class="form-control @error('estado_civil') is-invalid @enderror" name="estado_civil" required>
                                        
                                        <option value="Soltero/a" {{ old('estado_civil')=='Soltero/a'?'selected':'' }}>Soltero/a</option>
                                        <option value="Casado/a" {{ old('estado_civil')=='Casado/a'?'selected':'' }}>Casado/a</option>
                                        <option value="Divorciado/a" {{ old('estado_civil')=='Divorciado/a'?'selected':'' }}>Divorciado/a</option>
                                        <option value="Vuido/a" {{ old('estado_civil')=='Vuido/a'?'selected':'' }}>Vuido/a</option>
                                        
                                    </select>
                                    @error('estado_civil')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="etnia">Etnia<i class="text-danger">*</i></label>
                                    <select id="etnia" class="form-control @error('etnia') is-invalid @enderror" name="etnia" required>
                                        
                                        <option value="Mestizos" {{ old('etnia')=='Mestizos'?'selected':'' }}>Mestizos</option>
                                        <option value="Blancos" {{ old('etnia')=='Blancos'?'selected':'' }}>Blancos</option>
                                        <option value="Afroecuatorianos" {{ old('etnia')=='Afroecuatorianos'?'selected':'' }}>Afroecuatorianos</option>
                                        <option value="Indígenas" {{ old('etnia')=='Indígenas'?'selected':'' }}>Indígenas</option>
                                        <option value="Montubios" {{ old('etnia')=='Montubios'?'selected':'' }}>Montubios</option>
                                        <option value="otros" {{ old('etnia')=='otros'?'selected':'' }}>otros</option>
                                        
                                    </select>
                                    @error('etnia')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="telefono">Teléfono<i class="text-danger">*</i></label>
                                    <input type="text" class="form-control @error('telefono') is-invalid @enderror" id="telefono" value="{{ old('telefono') }}" name="telefono" required placeholder="Ingrese teléfono...">
                                    @error('telefono')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="celular">Celular<i class="text-danger">*</i></label>
                                    <input type="text" class="form-control @error('celular') is-invalid @enderror" id="celular" name="celular" value="{{ old('celular') }}" required placeholder="Ingrese celular...">
                                    @error('celular')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                
                            <div class="form-row">
                                
                                <div class="form-group col-md-3">
                                    <label for="pais">País<i class="text-danger">*</i></label>
                                    <input type="text" class="form-control @error('pais') is-invalid @enderror" id="pais" name="pais" value="{{ old('pais') }}" required placeholder="Ingrese país...">
                                    @error('pais')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="provincia">Provincia<i class="text-danger">*</i></label>
                                    <select id="provincia" class="form-control @error('provincia') is-invalid @enderror" name="provincia" required onchange="cargarCantones(this);">
                                        @foreach ($provincias as $provincia)
                                        <option value="{{ $provincia->id }}" {{ old('provincia')==$provincia->id?'selected':'' }}>
                                            {{ $provincia->provincia }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('provincia')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="canton">Cantón<i class="text-danger">*</i></label>
                                    <select id="canton" class="form-control @error('canton') is-invalid @enderror" name="canton" onchange="cargarParroquias(this);" required>
                                        
                                    </select>
                                    @error('canton')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="parroquia">Parroquia<i class="text-danger">*</i></label>
                                    <select id="parroquia" class="form-control @error('parroquia') is-invalid @enderror" name="parroquia"  required>
                
                                    </select>
                                    @error('parroquia')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                
                            <div class="form-group">
                                <label for="direccion">Dirección<i class="text-danger">*</i></label>
                                <input type="text" class="form-control @error('direccion') is-invalid @enderror" id="direccion" name="direccion" value="{{ old('direccion') }}" placeholder="Ingrese dirección..." required>
                                @error('direccion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                

                            
                        </div>
                    </section>
                    <h3>Información laboral </h3>
                    <section>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="">Trabaja actualmente<i class="text-danger">*</i></label>
                                <div class="form-check form-check-inline ml-2">
                                    <input class="form-check-input @error('trabaja') is-invalid @enderror" type="radio" name="trabaja" id="trabaja_si" value="SI" {{ old('trabaja')=='SI'?'checked':'' }}>
                                    <label class="form-check-label" for="trabaja_si">SI</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="trabaja" id="trabaja_no" value="NO" {{ old('trabaja')=='NO'?'checked':'checked' }}>
                                    <label class="form-check-label" for="trabaja_no">NO</label>
                                </div>
                                @error('trabaja')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="tipo_institucion">Tipo de institución</label>
                                <select id="tipo_institucion" class="form-control @error('tipo_institucion') is-invalid @enderror" name="tipo_institucion">
                                    
                                    <option value="PÚBLICA" {{ old('tipo_institucion')=='PÚBLICA'?'selected':'' }}>PÚBLICA</option>
                                    <option value="PRIVADA" {{ old('tipo_institucion')=='PRIVADA'?'selected':'' }}>PRIVADA</option>
                                    <option value="MIXTA" {{ old('tipo_institucion')=='MIXTA'?'selected':'' }}>MIXTA</option>
                                    
                                </select>
                                @error('tipo_institucion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="nombre_empresa">Nombre de la empresa</label>
                                <input type="text" class="form-control @error('nombre_empresa') is-invalid @enderror" id="nombre_empresa" name="nombre_empresa" value="{{ old('nombre_empresa') }}" placeholder="Ingrese nombre de la empresa..">
                                @error('nombre_empresa')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="cargo">Cargo</label>
                                <input type="text" class="form-control @error('cargo') is-invalid @enderror" id="cargo" name="cargo" value="{{ old('cargo') }}" placeholder="Ingrese cargo...">
                                @error('cargo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                                
                            
                            <div class="form-group col-md-3">
                                <label for="provincia_laboral">Provincia</label>
                                <select id="provincia_laboral" class="form-control @error('provincia_laboral') is-invalid @enderror" name="provincia_laboral" required onchange="cargarCantonesLaboral(this);">
                                    @foreach ($provincias as $provincia)
                                    <option value="{{ $provincia->id }}" {{ old('provincia_laboral')==$provincia->id?'selected':'' }}>
                                        {{ $provincia->provincia }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('provincia_laboral')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-3">
                                <label for="canton_laboral">Cantón</label>
                                <select id="canton_laboral" class="form-control @error('canton_laboral') is-invalid @enderror" name="canton_laboral" onchange="cargarParroquiasLaboral(this);">
                                    
                                </select>
                                @error('canton_laboral')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-3">
                                <label for="parroquia_laboral">Parroquia</label>
                                <select id="parroquia_laboral" class="form-control @error('parroquia_laboral') is-invalid @enderror" name="parroquia_laboral">
            
                                </select>
                                @error('parroquia_laboral')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-3">
                                <label for="direccion_laboral">Dirección</label>
                                <input type="text" class="form-control @error('direccion_laboral') is-invalid @enderror" id="direccion_laboral" name="direccion_laboral" value="{{ old('direccion_laboral') }}" placeholder="Ingrese dirección laboral...">
                                @error('direccion_laboral')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="telefono_laboral">Número de teléfono</label>
                                <input type="text" class="form-control @error('telefono_laboral') is-invalid @enderror" id="telefono_laboral" name="telefono_laboral" value="{{ old('telefono_laboral') }}" placeholder="Ingrese # de teléfono laboral..">
                                @error('telefono_laboral')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="extencion">Extención</label>
                                <input type="text" class="form-control @error('extencion') is-invalid @enderror" id="extencion" name="extencion" value="{{ old('extencion') }}" placeholder="Ingrese extención...">
                                @error('extencion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="email_laboral">Email</label>
                                <input type="email" class="form-control @error('email_laboral') is-invalid @enderror" id="email_laboral" name="email_laboral" value="{{ old('email_laboral') }}" placeholder="Ingrese email laboral...">
                                @error('email_laboral')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                    </section>
                    <h3>Registros académicos</h3>
                    <section>
                        <p class="text-danger"> <strong>Información Pregrado</strong></p>
                        
                        <div class="form-row">
                            
                            <div class="form-group col-md-6">
                                <label for="institucion_pregrado">Institución<i class="text-danger">*</i></label>
                                <input type="text" class="form-control @error('institucion_pregrado') is-invalid @enderror" id="institucion_pregrado" name="institucion_pregrado" value="{{ old('institucion_pregrado') }}" placeholder="Ingrese institución..." required>
                                @error('institucion_pregrado')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="tipo_pregrado">Tipo de universidad<i class="text-danger">*</i> </label>
                                <select id="tipo_pregrado" class="form-control @error('tipo_pregrado') is-invalid @enderror" name="tipo_pregrado" required>
                                    
                                    <option value="PÚBLICA" {{ old('tipo_pregrado')=='PÚBLICA'?'selected':'' }}>PÚBLICA</option>
                                    <option value="PRIVADA" {{ old('tipo_pregrado')=='PRIVADA'?'selected':'' }}>PRIVADA</option>
                                    <option value="MIXTA" {{ old('tipo_pregrado')=='MIXTA'?'selected':'' }}>MIXTA</option>
                                    
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
                                <input type="text" class="form-control @error('titulo_pregrado') is-invalid @enderror" id="titulo_pregrado" name="titulo_pregrado" value="{{ old('titulo_pregrado') }}" placeholder="Ingrese título de pregrado..." required>
                                @error('titulo_pregrado')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="especialidad_pregrado">Especialidad<i class="text-danger">*</i></label>
                                <input type="text" class="form-control @error('especialidad_pregrado') is-invalid @enderror" id="especialidad_pregrado" name="especialidad_pregrado" value="{{ old('especialidad_pregrado') }}" placeholder="Ingrese especialidad de pregrado..." required>
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
                                <input type="number" class="form-control @error('duracion_pregrado') is-invalid @enderror" id="duracion_pregrado" name="duracion_pregrado" value="{{ old('duracion_pregrado') }}" placeholder="Ingrese duración pregrado...">
                                @error('duracion_pregrado')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="fecha_graduacion_pregrado">Fecha de graduación</label>
                                <input type="date" class="form-control @error('fecha_graduacion_pregrado') is-invalid @enderror" id="fecha_graduacion_pregrado" name="fecha_graduacion_pregrado" value="{{ old('fecha_graduacion_pregrado') }}" placeholder="Ingrese fecha graduación de pregrado...">
                                @error('fecha_graduacion_pregrado')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="calificacion_grado_pregrado">Calificación de grado</label>
                                <input type="text" class="form-control @error('calificacion_grado_pregrado') is-invalid @enderror" id="calificacion_grado_pregrado" name="calificacion_grado_pregrado" value="{{ old('calificacion_grado_pregrado') }}" placeholder="Ingrese fecha graduación de pregrado...">
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
                                <input type="text" class="form-control @error('pais_pregrado') is-invalid @enderror" id="pais_pregrado" name="pais_pregrado" value="{{ old('pais_pregrado') }}" placeholder="Ingrese país...">
                                @error('pais_pregrado')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="provincia_pregrado">Provincia</label>
                                <input type="text" class="form-control @error('provincia_pregrado') is-invalid @enderror" id="provincia_pregrado" name="provincia_pregrado" value="{{ old('provincia_pregrado') }}" placeholder="Ingrese provincia...">
                                @error('provincia_pregrado')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="canton_pregrado">Cantón</label>
                                <input type="text" class="form-control @error('canton_pregrado') is-invalid @enderror" id="canton_pregrado" name="canton_pregrado" value="{{ old('canton_pregrado') }}" placeholder="Ingrese cantón...">
                                @error('canton_pregrado')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>




                        <hr>
                        <p class="text-danger"> <strong>Información Posgrado</strong></p>

                        
                        <div class="form-group">
                            <label for="institucion_posgrado">Institución</label>
                            <input type="text" class="form-control @error('institucion_posgrado') is-invalid @enderror" id="institucion_posgrado" name="institucion_posgrado" value="{{ old('institucion_posgrado') }}" placeholder="Ingrese institución...">
                            @error('institucion_posgrado')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        

                        <div class="form-row">    
                            <div class="form-group col-md-6">
                                <label for="titulo_posgrado">Título</label>
                                <input type="text" class="form-control @error('titulo_posgrado') is-invalid @enderror" id="titulo_posgrado" name="titulo_posgrado" value="{{ old('titulo_posgrado') }}" placeholder="Ingrese título de posgrado...">
                                @error('titulo_posgrado')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="especialidad_posgrado">Especialidad</label>
                                <input type="text" class="form-control @error('especialidad_posgrado') is-invalid @enderror" id="especialidad_posgrado" name="especialidad_posgrado" value="{{ old('especialidad_posgrado') }}" placeholder="Ingrese especialidad de posgrado...">
                                @error('especialidad_posgrado')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="duracion_posgrado">Duración (años)</label>
                                <input type="number" class="form-control @error('duracion_posgrado') is-invalid @enderror" id="duracion_posgrado" name="duracion_posgrado" value="{{ old('duracion_posgrado') }}" placeholder="Ingrese duración posgrado...">
                                @error('duracion_posgrado')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="fecha_graduacion_posgrado">Fecha de graduación</label>
                                <input type="date" class="form-control @error('fecha_graduacion_posgrado') is-invalid @enderror" id="fecha_graduacion_posgrado" name="fecha_graduacion_posgrado" value="{{ old('fecha_graduacion_posgrado') }}" placeholder="Ingrese fecha graduación de posgrado...">
                                @error('fecha_graduacion_posgrado')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="calificacion_grado_posgrado">Calificación de grado</label>
                                <input type="text" class="form-control @error('calificacion_grado_posgrado') is-invalid @enderror" id="calificacion_grado_posgrado" name="calificacion_grado_posgrado" value="{{ old('calificacion_grado_posgrado') }}" placeholder="Ingrese fecha graduación de posgrado...">
                                @error('calificacion_grado_posgrado')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="pais_posgrado">País</label>
                                <input type="text" class="form-control @error('pais_posgrado') is-invalid @enderror" id="pais_posgrado" name="pais_posgrado" value="{{ old('pais_posgrado') }}" placeholder="Ingrese país...">
                                @error('pais_posgrado')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="provincia_posgrado">Provincia</label>
                                <input type="text" class="form-control @error('provincia_posgrado') is-invalid @enderror" id="provincia_posgrado" name="provincia_posgrado" value="{{ old('provincia_posgrado') }}" placeholder="Ingrese provincia...">
                                @error('provincia_posgrado')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="canton_posgrado">Cantón</label>
                                <input type="text" class="form-control @error('canton_posgrado') is-invalid @enderror" id="canton_posgrado" name="canton_posgrado" value="{{ old('canton_posgrado') }}" placeholder="Ingrese cantón...">
                                @error('canton_posgrado')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </section>
                    <h3>Finalizar</h3>
                    <section>
                        <input id="acceptoTerminos" name="acceptoTerminos" type="checkbox" class="required" required> 
                        <label for="acceptoTerminos">Estoy de acuerdo con los 
                            <a href="#" role="button" data-toggle="modal" data-target="#terminosCondicionesInscripcion">términos y condiciones</a>
                        </label>
                    </section>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal terminosCondicionesInscripcion -->
    <div class="modal fade" id="terminosCondicionesInscripcion" tabindex="-1" role="dialog" aria-labelledby="terminosCondicionesInscripcionLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="terminosCondicionesInscripcion">Términos y condiciones</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <pre class="text-justify">
                Con el fin de publicar, cargar o descargar materiales, comunicarse a través de esta página web o acceder a ella, así como a los Servicios, recursos y determinado o todo el Contenido de la página web (tal como se define a continuación), puede pedirse al Usuario que proporcione los datos de registro e inicie sesión. Se trata de una condición para el uso de esta página web, los Servicios y el Contenido de la página web que todos los datos del registro que proporcione el Usuario sean y se mantengan verídicos, correctos, actualizados y completos.
            </pre>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-dark" data-dismiss="modal">Cerrar</button>
        </div>
        </div>
    </div>
    </div>

    @push('linksCabeza')
        <script src="{{ asset('js/jquery.steps.min.js') }}"></script>
        <script src="{{ asset('vendor/validate/jquery.validate.min.js') }}"></script>
        <script src="{{ asset('vendor/validate/localization/messages_es.min.js') }}"></script>
    @endpush

    @prepend('linksPie')
        <script>

            var form = $("#example-form");

            form.validate({
                
                errorPlacement: function ( error, element ) {
                    // Add the `invalid-feedback` class to the error element
                    error.addClass( "invalid-feedback" );

                    if ( element.prop( "type" ) === "checkbox" ) {
                        error.insertAfter( element.next( "label" ) );
                    } else {
                        error.insertAfter( element );
                    }
                },
                highlight: function ( element, errorClass, validClass ) {
                    $( element ).addClass( "is-invalid" ).removeClass( "is-valid" );
                },
                unhighlight: function (element, errorClass, validClass) {
                    $( element ).addClass( "is-valid" ).removeClass( "is-invalid" );
                }
            });

            form.children("div").steps({
                headerTag: "h3",
                bodyTag: "section",
                transitionEffect: "slideLeft",
                labels: {
                    current: "paso actual:",
                    pagination: "Paginación",
                    finish: "Terminar",
                    next: "Siguente",
                    previous: "Anterior",
                    loading: "Cargando ..."
                },
                onStepChanging: function (event, currentIndex, newIndex)
                {
                    form.validate().settings.ignore = ":disabled,:hidden";
                    return form.valid();
                },
                onFinishing: function (event, currentIndex)
                {
                    form.validate().settings.ignore = ":disabled";
                    return form.valid();
                },
                onFinished: function (event, currentIndex)
                {
                    $.blockUI({message:'<h1>Espere por favor.!</h1>'});
                    form.submit();
                }
            });


            //obtener cantones por provincia
            var provincia=$("#provincia option:first").val();
            var provincia_laboral=$("#provincia_laboral option:first").val();
            obtenerCantones(provincia);
            obtenerCantonesLaboral(provincia_laboral);
            function cargarCantones(arg){
                var id=$(arg).val();
                obtenerCantones(id);
            }
            function obtenerCantones(id){
                var fila;
                $.blockUI({message:'<h1>Espere por favor.!</h1>'});
                $.post( "{{ route('obtenerCantonesXprovincia') }}", { id: id })
                .done(function( data ) {
                    $('#canton').html('');
                    $.each(data, function(i, item) {
                        fila+='<option value="'+item.id+'">'+item.canton+'</option>';
                    });
                    $('#canton').append(fila);

                    //cargar cantones
                    var canton=$("#canton option:first").val();
                    obtenerParroquias(canton);
                }).always(function(){
                    $.unblockUI();
                }).fail(function(){
                    $.notify("Ocurrio un error vuelva intentar.!", "error");
                });
            }

            //laboral
            function cargarCantonesLaboral(arg){
                var id=$(arg).val();
                obtenerCantonesLaboral(id);
            }
            function obtenerCantonesLaboral(id){
                var fila;
                $.blockUI({message:'<h1>Espere por favor.!</h1>'});
                $.post( "{{ route('obtenerCantonesXprovincia') }}", { id: id })
                .done(function( data ) {
                    $('#canton_laboral').html('');
                    $.each(data, function(i, item) {
                        fila+='<option value="'+item.id+'">'+item.canton+'</option>';
                    });
                    $('#canton_laboral').append(fila);

                    //cargar cantones
                    var canton=$("#canton_laboral option:first").val();
                    obtenerParroquiasLaboral(canton);
                }).always(function(){
                    $.unblockUI();
                }).fail(function(){
                    $.notify("Ocurrio un error vuelva intentar.!", "error");
                });
            }

            //obtener parrquias x canton
            function cargarParroquias(arg){
                var id=$(arg).val();
                obtenerParroquias(id);
            }
            function obtenerParroquias(id){
                var fila;
                $.blockUI({message:'<h1>Espere por favor.!</h1>'});
                $.post( "{{ route('obtenerParroquiasXcanton') }}", { id: id })
                .done(function( data ) {
                    $('#parroquia').html('');
                    $.each(data, function(i, item) {
                        fila+='<option value="'+item.id+'">'+item.parroquia+'</option>';
                    });
                    $('#parroquia').append(fila);
                }).always(function(){
                    $.unblockUI();
                }).fail(function(){
                    $.notify("Ocurrio un error vuelva intentar.!", "error");
                });
            }

            //laboral
            function cargarParroquiasLaboral(arg){
                var id=$(arg).val();
                obtenerParroquiasLaboral(id);
            }
            function obtenerParroquiasLaboral(id){
                var fila;
                $.blockUI({message:'<h1>Espere por favor.!</h1>'});
                $.post( "{{ route('obtenerParroquiasXcanton') }}", { id: id })
                .done(function( data ) {
                    $('#parroquia_laboral').html('');
                    $.each(data, function(i, item) {
                        fila+='<option value="'+item.id+'">'+item.parroquia+'</option>';
                    });
                    $('#parroquia_laboral').append(fila);
                }).always(function(){
                    $.unblockUI();
                }).fail(function(){
                    $.notify("Ocurrio un error vuelva intentar.!", "error");
                });
            }

        </script>
    @endprepend
@else
    <div class="alert alert-dark" role="alert">
        <strong>No se puede inscribir en está corte</strong>
    </div>
@endif

@endsection
