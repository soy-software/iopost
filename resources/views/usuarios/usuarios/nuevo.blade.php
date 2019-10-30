@extends('layouts.app',['title'=>'Listado de usuarios'])

@section('breadcrumbs', Breadcrumbs::render('nuevoUsuario'))
@section('barraLateral')

    <div class="breadcrumb justify-content-center">
        <a href="" class="breadcrumb-elements-item">
            <i class="fas fa-plus"></i>
            Complete información.
        </a>
        <div class="breadcrumb-elements-item dropdown p-0">
            <a href="#" class="breadcrumb-elements-item dropdown-toggle" data-toggle="dropdown">
                <i class="fas fa-users"></i>
                Ver usuarios por roles
            </a>

            <div class="dropdown-menu dropdown-menu-right">
                <a href="{{ route('usuarios') }}" class="dropdown-item"><i class="fas fa-user-lock"></i>Ver todos</a>
            </div>
        </div>
    </div>
@endsection

@section('content')

<form action="">
    <div class="card">
        <div class="card-header">
            Complete información
        </div>
        <div class="card-body">
            
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="email">Email<i class="text-danger">*</i></label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="Ingrese email..." required>
                </div>
                <div class="form-group col-md-6">
                    <label for="password">Password<i class="text-danger">*</i></label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Ingrese password..." required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="nombres">Nombres<i class="text-danger">*</i></label>
                    <input type="text" class="form-control" id="nombres" name="nombres" value="{{ old('nombres') }}" placeholder="Ingrese nombres.." required>
                </div>
                <div class="form-group col-md-6">
                    <label for="apellidos">Apellidos<i class="text-danger">*</i></label>
                    <input type="text" class="form-control" id="apellidos" name="apellidos" value="{{ old('apellidos') }}" placeholder="Ingrese apellidos..." required>
                </div>
            </div>


            <div class="form-row">
                
                <div class="form-group col-md-3">
                    <label for="tipo_identificacion">Tipo de identificación<i class="text-danger">*</i></label>
                    <select id="tipo_identificacion" class="form-control" name="tipo_identificacion" required>
                        <option value="Cédula" {{ old('tipo_identificacion')=='Cédula'?'selected':'' }}>Cédula</option>
                        <option value="Ruc persona Natural" {{ old('tipo_identificacion')=='Ruc persona Natural'?'selected':'' }}>Ruc persona Natural</option>
                        <option value="Ruc Sociedad Pública" {{ old('tipo_identificacion')=='Ruc Sociedad Pública'?'selected':'' }}>Ruc Sociedad Pública</option>
                        <option value="Ruc Sociedad Privada" {{ old('tipo_identificacion')=='Ruc Sociedad Privada'?'selected':'' }}>Ruc Sociedad Privada</option>
                        <option value="Pasaporte" {{ old('tipo_identificacion')=='Pasaporte'?'selected':'' }}>Pasaporte</option>
                        <option value="Otros" {{ old('tipo_identificacion')=='Otros'?'selected':'' }}>Otros</option>
                        
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="identificacion">Identificación<i class="text-danger">*</i></label>
                    <input type="text" class="form-control" id="identificacion" name="identificacion" value="{{ old('identificacion') }}" required placeholder="Ingrese identificación...">
                </div>
                <div class="form-group col-md-3">
                    <label for="fecha_nacimiento">Fecha de nacimiento</label>
                    <input type="date" class="form-control" id="fecha_nacimiento" name="identificacion" required placeholder="Fecha de nacimiento...">
                </div>
                <div class="form-group col-md-3">
                    <label for="">Sexo<i class="text-danger">*</i></label>
                    <div class="form-check form-check-inline ml-2">
                        <input class="form-check-input" type="radio" name="sexo" id="inlineRadio1" value="Hombre" checked>
                        <label class="form-check-label" for="inlineRadio1">Hombre</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="sexo" id="inlineRadio2" value="Mujer">
                        <label class="form-check-label" for="inlineRadio2">Mujer</label>
                    </div>
                </div>
            </div>

            <div class="form-row">
                
                <div class="form-group col-md-3">
                    <label for="estado_civil">Estado civil<i class="text-danger">*</i></label>
                    <select id="estado_civil" class="form-control" name="estado_civil" required>
                        
                        <option value="Soltero/a">Soltero/a</option>
                        <option value="Casado/a">Casado/a</option>
                        <option value="Divorciado/a">Divorciado/a</option>
                        <option value="Vuido/a">Vuido/a</option>
                        
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="etnia">Etnia<i class="text-danger">*</i></label>
                    <select id="etnia" class="form-control" name="etnia" required>
                        
                        <option value="Mestizos">Mestizos</option>
                        <option value="Blancos">Blancos</option>
                        <option value="Afroecuatorianos">Afroecuatorianos</option>
                        <option value="Indígenas">Indígenas</option>
                        <option value="Montubios">Montubios</option>
                        <option value="otros">otros</option>
                        
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="telefono">Teléfono</label>
                    <input type="text" class="form-control" id="telefono" name="telefono" required placeholder="Ingrese teléfono...">
                </div>
                <div class="form-group col-md-3">
                    <label for="celular">Celular</label>
                    <input type="text" class="form-control" id="celular" name="celular" required placeholder="Ingrese celular...">
                </div>
            </div>

            <div class="form-row">
                
                <div class="form-group col-md-3">
                    <label for="pais">País<i class="text-danger">*</i></label>
                    <input type="text" class="form-control" id="pais" name="pais" required placeholder="Ingrese país...">
                </div>
                <div class="form-group col-md-3">
                    <label for="provincia">Provincia<i class="text-danger">*</i></label>
                    <select id="provincia" class="form-control" name="provincia" required>
                        <option value="Cotopaxi">Cotopaxi</option>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="canton">Cantón<i class="text-danger">*</i></label>
                    <select id="canton" class="form-control" name="canton" required>
                        <option value="Cotopaxi">Cotopaxi</option>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="parroquia">Parroquia<i class="text-danger">*</i></label>
                    <select id="parroquia" class="form-control" name="parroquia" required>
                        <option value="Cotopaxi">Cotopaxi</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="direccion">Dirección<i class="text-danger">*</i></label>
                <input type="text" class="form-control" id="direccion" placeholder="Ingrese dirección..." required>
            </div>

            <div class="form-row">
                
                <div class="form-group col-md-3">
                    <label for="">Tiene discapacidad</label>
                    <div class="form-check form-check-inline ml-2">
                        <input class="form-check-input" type="radio" name="tiene_discapacidad" id="tiene_discapacidad1" value="SI">
                        <label class="form-check-label" for="tiene_discapacidad1">SI</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="tiene_discapacidad" id="tiene_discapacidad2" value="NO">
                        <label class="form-check-label" for="tiene_discapacidad2">NO</label>
                    </div>
                        
                </div>
                <div class="form-group col-md-3">
                    <label for="porcentaje_discapacidad">% discapacidad</label>
                    <input type="text" class="form-control" id="porcentaje_discapacidad" placeholder="Ingrese % porcentaje de discapacidad...">
                </div>
                <div class="form-group col-md-3">
                    <label for="canton">Tiene carnet de conadis</label>
                    <div class="form-check form-check-inline ml-2">
                        <input class="form-check-input" type="radio" name="tiene_carnet_conadis" id="tiene_carnet_conadis1" value="SI">
                        <label class="form-check-label" for="tiene_carnet_conadis1">SI</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="tiene_carnet_conadis" id="tiene_carnet_conadis2" value="NO">
                        <label class="form-check-label" for="tiene_carnet_conadis2">NO</label>
                    </div>
                </div>
                <div class="form-group col-md-3">
                    <label for="porcentaje_carnet_conadis">% carnet conadis</label>
                    <input type="text" class="form-control" id="porcentaje_carnet_conadis" placeholder="Ingrese % porcentaje de carnet conadis...">
                </div>
            </div>
            
            <div class="form-group">
                <label for="exampleFormControlFile1">Seleciona foto</label>
                <input type="file" class="form-control-file" id="exampleFormControlFile1">
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
    <script>
    $('#menuUsuarios').addClass('active');    
    </script>
    
@endprepend
@endsection
