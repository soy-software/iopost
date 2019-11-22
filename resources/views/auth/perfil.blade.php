@extends('layouts.app',['title'=>'Mi perfil'])

@section('breadcrumbs', Breadcrumbs::render('miPerfil'))


@section('content')
<div id="accordion">
        <div class="card">
          <div class="card-header" id="headingOne">
            <h5 class="mb-0">
              <button class="btn btn-link btn-block" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                INFORMACIÓN PERSONAL
              </button>
            </h5>
          </div>
      
          <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
            <form action="{{ route('miPerfilActualizarDatos') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">        
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="email">Email<i class="text-danger">*</i></label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email',$usuario->email) }}" placeholder="Ingrese email..." required readonly>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="password">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Ingrese password...">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
        
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="nombres">Nombres<i class="text-danger">*</i></label>
                            <input type="text" class="form-control @error('nombres') is-invalid @enderror" id="nombres" name="nombres" value="{{ old('nombres',$usuario->nombres) }}" placeholder="Ingrese nombres.." required>
                            @error('nombres')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="apellidos">Apellidos<i class="text-danger">*</i></label>
                            <input type="text" class="form-control @error('apellidos') is-invalid @enderror" id="apellidos" name="apellidos" value="{{ old('apellidos',$usuario->apellidos) }}" placeholder="Ingrese apellidos..." required>
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
                                <option value="Cédula" {{ old('tipo_identificacion',$usuario->tipo_identificacion)=='Cédula'?'selected':'' }}>Cédula</option>
                                <option value="Ruc persona Natural" {{ old('tipo_identificacion',$usuario->tipo_identificacion)=='Ruc persona Natural'?'selected':'' }}>Ruc persona Natural</option>
                                <option value="Ruc Sociedad Pública" {{ old('tipo_identificacion',$usuario->tipo_identificacion)=='Ruc Sociedad Pública'?'selected':'' }}>Ruc Sociedad Pública</option>
                                <option value="Ruc Sociedad Privada" {{ old('tipo_identificacion',$usuario->tipo_identificacion)=='Ruc Sociedad Privada'?'selected':'' }}>Ruc Sociedad Privada</option>
                                <option value="Pasaporte" {{ old('tipo_identificacion',$usuario->tipo_identificacion)=='Pasaporte'?'selected':'' }}>Pasaporte</option>
                                <option value="Otros" {{ old('tipo_identificacion',$usuario->tipo_identificacion)=='Otros'?'selected':'' }}>Otros</option>
                                
                            </select>
                            @error('tipo_identificacion')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label for="identificacion">Identificación<i class="text-danger">*</i></label>
                            <input type="text" class="form-control @error('identificacion') is-invalid @enderror" id="identificacion" name="identificacion" value="{{ old('identificacion',$usuario->identificacion) }}" required placeholder="Ingrese identificación...">
                            @error('identificacion')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label for="fecha_nacimiento">Fecha de nacimiento</label>
                            <input type="date" class="form-control @error('fecha_nacimiento') is-invalid @enderror" id="fecha_nacimiento" name="fecha_nacimiento" value="{{ old('fecha_nacimiento',$usuario->fecha_nacimiento) }}" required placeholder="Fecha de nacimiento...">
                            @error('fecha_nacimiento')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label for="">Sexo<i class="text-danger">*</i></label>
                            <div class="form-check form-check-inline ml-2">
                                <input class="form-check-input @error('sexo') is-invalid @enderror" type="radio" name="sexo" id="sexo_hombre" value="Masculino" {{ old('sexo',$usuario->sexo)=='Masculino'?'checked':'checked' }}>
                                <label class="form-check-label" for="sexo_hombre">Masculino</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sexo" id="sexo_mujer" value="Femenino" {{ old('sexo',$usuario->sexo)=='Femenino'?'checked':'' }}>
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
                                
                                <option value="Soltero/a" {{ old('estado_civil',$usuario->estado_civil)=='Soltero/a'?'selected':'' }}>Soltero/a</option>
                                <option value="Casado/a" {{ old('estado_civil',$usuario->estado_civil)=='Casado/a'?'selected':'' }}>Casado/a</option>
                                <option value="Divorciado/a" {{ old('estado_civil',$usuario->estado_civil)=='Divorciado/a'?'selected':'' }}>Divorciado/a</option>
                                <option value="Vuido/a" {{ old('estado_civil',$usuario->estado_civil)=='Vuido/a'?'selected':'' }}>Vuido/a</option>
                                
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
                                
                                <option value="Mestizos" {{ old('etnia',$usuario->etnia)=='Mestizos'?'selected':'' }}>Mestizos</option>
                                <option value="Blancos" {{ old('etnia',$usuario->etnia)=='Blancos'?'selected':'' }}>Blancos</option>
                                <option value="Afroecuatorianos" {{ old('etnia',$usuario->etnia)=='Afroecuatorianos'?'selected':'' }}>Afroecuatorianos</option>
                                <option value="Indígenas" {{ old('etnia',$usuario->etnia)=='Indígenas'?'selected':'' }}>Indígenas</option>
                                <option value="Montubios" {{ old('etnia',$usuario->etnia)=='Montubios'?'selected':'' }}>Montubios</option>
                                <option value="otros" {{ old('etnia',$usuario->etnia)=='otros'?'selected':'' }}>otros</option>
                                
                            </select>
                            @error('etnia')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label for="telefono">Teléfono<i class="text-danger">*</i></label>
                            <input type="text" class="form-control @error('telefono') is-invalid @enderror" id="telefono" value="{{ old('telefono',$usuario->telefono) }}" name="telefono" required placeholder="Ingrese teléfono...">
                            @error('telefono')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label for="celular">Celular<i class="text-danger">*</i></label>
                            <input type="text" class="form-control @error('celular') is-invalid @enderror" id="celular" name="celular" value="{{ old('celular',$usuario->celular) }}" required placeholder="Ingrese celular...">
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
                            <input type="text" class="form-control @error('pais') is-invalid @enderror" id="pais" name="pais" value="{{ old('pais',$usuario->pais) }}" required placeholder="Ingrese país...">
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
                                <option value="{{ $provincia->id }}" {{ old('provincia',$usuario->parroquia->canton->provincia->id??0)==$provincia->id?'selected':'' }}>
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
                        <input type="text" class="form-control @error('direccion') is-invalid @enderror" id="direccion" name="direccion" value="{{ old('direccion',$usuario->direccion) }}" placeholder="Ingrese dirección..." required>
                        @error('direccion')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
        
                    <div class="form-row">
                        
                        <div class="form-group col-md-3">
                            <label for="">Tiene discapacidad</label>
                            <div class="form-check form-check-inline ml-2">
                                <input class="form-check-input @error('tiene_discapacidad') is-invalid @enderror" type="radio" name="tiene_discapacidad"  id="tiene_discapacidad1" value="SI" {{ old('tiene_discapacidad',$usuario->tiene_discapacidad)=='SI'?'checked':'checked' }}>
                                <label class="form-check-label" for="tiene_discapacidad1">SI</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="tiene_discapacidad" id="tiene_discapacidad2" value="NO" {{ old('tiene_discapacidad',$usuario->tiene_discapacidad)=='NO'?'checked':'' }}>
                                <label class="form-check-label" for="tiene_discapacidad2">NO</label>
                            </div>
                            @error('tiene_discapacidad')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                                
                        </div>
                        <div class="form-group col-md-3">
                            <label for="porcentaje_discapacidad">% discapacidad</label>
                            <input type="text" class="form-control @error('porcentaje_discapacidad') is-invalid @enderror" id="porcentaje_discapacidad" name="porcentaje_discapacidad" value="{{ old('porcentaje_discapacidad',$usuario->porcentaje_discapacidad) }}" placeholder="Ingrese % porcentaje de discapacidad...">
                            @error('porcentaje_discapacidad')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label for="canton">Tiene carnet de conadis</label>
                            <div class="form-check form-check-inline ml-2">
                                <input class="form-check-input @error('tiene_carnet_conadis') is-invalid @enderror" type="radio" name="tiene_carnet_conadis" id="tiene_carnet_conadis1" value="SI" {{ old('tiene_carnet_conadis',$usuario->tiene_carnet_conadis)=='SI'?'checked':'checked' }}>
                                <label class="form-check-label" for="tiene_carnet_conadis1">SI</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="tiene_carnet_conadis" id="tiene_carnet_conadis2" value="NO" {{ old('tiene_carnet_conadis',$usuario->tiene_carnet_conadis)=='NO'?'checked':'' }}>
                                <label class="form-check-label" for="tiene_carnet_conadis2">NO</label>
                            </div>
                            @error('tiene_carnet_conadis')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label for="porcentaje_carnet_conadis">% carnet conadis</label>
                            <input type="text" class="form-control @error('porcentaje_carnet_conadis') is-invalid @enderror" id="porcentaje_carnet_conadis" name="porcentaje_carnet_conadis" placeholder="Ingrese % porcentaje de carnet conadis..." value="{{ old('porcentaje_carnet_conadis',$usuario->porcentaje_carnet_conadis) }}">
                            @error('porcentaje_carnet_conadis')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="foto">Seleciona foto</label>
                        <input type="file" class="form-control-file @error('foto') is-invalid @enderror" id="foto" name="foto" accept="image/*">
                        @error('foto')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
        
                        <a href="">
                            <img src="" alt="">
                        </a>
                        @if (Storage::exists($usuario->foto))
                            <a href="{{ Storage::url($usuario->foto) }}" class="btn-link float-right" data-toggle="tooltip" data-placement="top" title="Ver foto">
                                <img src="{{ Storage::url($usuario->foto) }}" alt="" class="img-fluid" width="45px;">
                            </a>
                        @endif
                    </div>
                        
                </div>
                <div class="card-footer text-muted">
                    <button type="submit" class="btn btn-primary">Actualizar información personal</button>
                </div>
            </form>
          </div>
        </div>
        <div class="card">
          <div class="card-header" id="headingTwo">
            <h5 class="mb-0">
              <button class="btn btn-link btn-block collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                INFORMACIÓN LABORAL
              </button>
            </h5>
          </div>
          <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
            @php($infoLab=$usuario->informacionLaboral)
            <form action="{{ route('miPerfilActualizarLaboral') }}" method="POST">
                @csrf
                <div class="card-body">            
                       
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="">Trabaja actualmente<i class="text-danger">*</i></label>
                            <div class="form-check form-check-inline ml-2">
                                <input class="form-check-input @error('trabaja') is-invalid @enderror" type="radio" name="trabaja" id="trabaja_si" value="SI" {{ old('trabaja',$infoLab->trabaja??'')=='SI'?'checked':'' }}>
                                <label class="form-check-label" for="trabaja_si">SI</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="trabaja" id="trabaja_no" value="NO" {{ old('trabaja',$infoLab->trabaja??'')=='NO'?'checked':'' }}>
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
                                
                                <option value="PÚBLICA" {{ old('tipo_institucion',$infoLab->tipo_institucion??'')=='PÚBLICA'?'selected':'' }}>PÚBLICA</option>
                                <option value="PRIVADA" {{ old('tipo_institucion',$infoLab->tipo_institucion??'')=='PRIVADA'?'selected':'' }}>PRIVADA</option>
                                <option value="MIXTA" {{ old('tipo_institucion',$infoLab->tipo_institucion??'')=='MIXTA'?'selected':'' }}>MIXTA</option>
                                
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
                            <input type="text" class="form-control @error('nombre_empresa') is-invalid @enderror" id="nombre_empresa" name="nombre_empresa" value="{{ old('nombre_empresa',$infoLab->nombre_empresa??'') }}" placeholder="Ingrese nombre de la empresa..">
                            @error('nombre_empresa')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="cargo">Cargo</label>
                            <input type="text" class="form-control @error('cargo') is-invalid @enderror" id="cargo" name="cargo" value="{{ old('cargo',$infoLab->cargo??'') }}" placeholder="Ingrese cargo...">
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
                                
                                <option value="{{ $provincia->id }}" {{ old('provincia_laboral',$infoLab->parroquia->canton->provincia->id??0)==$provincia->id?'selected':'' }}>
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
                            <input type="text" class="form-control @error('direccion_laboral') is-invalid @enderror" id="direccion_laboral" name="direccion_laboral" value="{{ old('direccion_laboral',$infoLab->direccion??'') }}" placeholder="Ingrese dirección laboral...">
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
                            <input type="text" class="form-control @error('telefono_laboral') is-invalid @enderror" id="telefono_laboral" name="telefono_laboral" value="{{ old('telefono_laboral',$infoLab->telefono??'') }}" placeholder="Ingrese # de teléfono laboral..">
                            @error('telefono_laboral')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="extencion">Extención</label>
                            <input type="text" class="form-control @error('extencion') is-invalid @enderror" id="extencion" name="extencion" value="{{ old('extencion',$infoLab->extencion??'') }}" placeholder="Ingrese extención...">
                            @error('extencion')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="email_laboral">Email</label>
                            <input type="email" class="form-control @error('email_laboral') is-invalid @enderror" id="email_laboral" name="email_laboral" value="{{ old('email_laboral',$infoLab->email??'') }}" placeholder="Ingrese email laboral...">
                            @error('email_laboral')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    
                </div>
                <div class="card-footer text-muted">
                    <button type="submit" class="btn btn-primary">Actualizar información laboral</button>
                </div>
            </form>
          </div>
        </div>
        <div class="card">
          <div class="card-header" id="headingThree">
            <h5 class="mb-0">
              <button type="button" class="btn btn-link btn-block collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                REGISTROS ACADÉMICOS
              </button>
            </h5>
          </div>
          <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
           
            
            
                <div class="card-body">
                    <form action="{{ route('miPerfilActualizarAcademico') }}" method="POST">
                        @csrf
                        <div class="form-row">
                            
                            <div class="form-group col-md-4">
                                <label for="institucion_pregrado">Institución<i class="text-danger">*</i></label>
                                <input type="text" class="form-control @error('institucion_pregrado') is-invalid @enderror" id="institucion_pregrado" name="institucion_pregrado" value="{{ old('institucion_pregrado') }}" placeholder="Ingrese institución..." required>
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
                                    <option value="LICENCIATURA" {{ old('nivel')=='LICENCIATURA'?'selected':'' }}>LICENCIATURA</option>
                                    <option value="TERCER NIVEL" {{ old('nivel')=='TERCER NIVEL'?'selected':'' }}>TERCER NIVEL</option>    
                                    <option value="CUARTO NIVEL" {{ old('nivel')=='CUARTO NIVEL'?'selected':'' }}>CUARTO NIVEL</option>    
                                    <option value="DOCTORADO" {{ old('nivel')=='DOCTORADO'?'selected':'' }}>DOCTORADO</option>    

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
                        <button type="submit" class="btn btn-primary">
                            Guardar registro académico
                        </button>
                    </form>
                </div>
                <div class="card-footer text-muted">
                    <p>Mis niveles académicos</p>
                    @if (count($usuario->registrosAcademicos)>0)
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Acciónes</th>
                                        <th scope="col">Institución</th>
                                        <th scope="col">Nivel</th>
                                        <th scope="col">Tipo</th>
                                        <th scope="col">Título</th>
                                        <th scope="col">Especialidad</th>
                                        <th scope="col">Duración</th>
                                        <th scope="col">Fecha de graduación</th>
                                        <th scope="col">Calificación</th>
                                        <th scope="col">País</th>
                                        <th scope="col">Provincia</th>
                                        <th scope="col">Cantón</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($usuario->registrosAcademicos as $ra)
                                        <tr>
                                            <th>
                                                <div class="btn-group btn-group-sm" role="group" aria-label="...">
                                                    <button type="button" onclick="eliminar(this);" data-url="{{ route('eliminarMiRegistroAcademico',$ra->id) }}" class="btn btn-danger" data-toggle="tooltip" data-placement="top" data-title="Eliminar {{ $ra->institucion_pregrado }}">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                    <a href="{{ route('editarMiRegistroAcademico',$ra->id) }}" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Editar {{ $ra->institucion_pregrado }}">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                </div>
                                            </th>
                                            <th scope="row">
                                                {{ $ra->institucion_pregrado }}
                                            </th>
                                            <td>
                                                {{ $ra->nivel }}
                                            </td>
                                            <td>
                                                {{ $ra->tipo_pregrado }}
                                            </td>
                                            <td>
                                                {{ $ra->titulo_pregrado }}
                                            </td>
                                            <td>
                                                {{ $ra->especialidad_pregrado }}
                                            </td>
                                            <td>
                                                {{ $ra->duracion_pregrado }}
                                            </td>
                                            <td>
                                                {{ $ra->fecha_graduacion_pregrado }}
                                            </td>
                                            <td>
                                               {{ $ra->calificacion_grado_pregrado }} 
                                            </td>
                                            <td>
                                                {{ $ra->pais_pregrado }}
                                            </td>
                                            <td>
                                                {{ $ra->provincia_pregrado }}
                                            </td>
                                            <td>
                                                {{ $ra->canton_pregrado }}
                                            </td>
                                        </tr>    
                                    @endforeach
                                    
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="alert alert-dark" role="alert">
                            <strong>No tiene registros académicos registrados</strong>
                        </div>
                    @endif
                </div>
            
          </div>
        </div>
      </div>




@push('linksCabeza')

@endpush
@prepend('linksPie')
    <script>
    $('#menuEmail').addClass('active');   
    
    
    var provincia=$("#provincia option:selected").val();
    obtenerCantones(provincia);
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
                
                if(item.id=={{ $usuario->parroquia->canton->id??0 }}){
                    fila+='<option value="'+item.id+'" selected>'+item.canton+'</option>';
                }else{
                    fila+='<option value="'+item.id+'">'+item.canton+'</option>';
                }
            });
            $('#canton').append(fila);

            //cargar cantones
            var canton=$("#canton option:selected").val();
            obtenerParroquias(canton);
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
                if(item.id=={{ $usuario->parroquia->id??0 }}){
                    fila+='<option value="'+item.id+'" selected>'+item.parroquia+'</option>';
                }else{
                    fila+='<option value="'+item.id+'">'+item.parroquia+'</option>';
                }
            });
            $('#parroquia').append(fila);
        }).always(function(){
            $.unblockUI();
        }).fail(function(){
            $.notify("Ocurrio un error vuelva intentar.!", "error");
        });
    }


    var provincia_l=$("#provincia_laboral option:selected").val();
        obtenerCantonesLaboral(provincia_l);
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
                    
                    if(item.id=={{ $infoLab->parroquia->canton->id??0 }}){
                        fila+='<option value="'+item.id+'" selected>'+item.canton+'</option>';
                    }else{
                        fila+='<option value="'+item.id+'">'+item.canton+'</option>';
                    }
                });
                $('#canton_laboral').append(fila);
    
                //cargar cantones
                var canton=$("#canton_laboral option:selected").val();
                obtenerParroquiasLaboral(canton);
            }).always(function(){
                $.unblockUI();
            }).fail(function(){
                $.notify("Ocurrio un error vuelva intentar.!", "error");
            });
        }
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
                    if(item.id=={{ $infoLab->parroquia->id??0 }}){
                        fila+='<option value="'+item.id+'" selected>'+item.parroquia+'</option>';
                    }else{
                        fila+='<option value="'+item.id+'">'+item.parroquia+'</option>';
                    }
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
@endsection
