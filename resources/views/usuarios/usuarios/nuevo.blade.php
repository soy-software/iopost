@extends('layouts.app',['title'=>'Listado de usuarios'])

@section('breadcrumbs', Breadcrumbs::render('nuevoUsuario'))


@section('content')

<form action="{{ route('guardarUsuario') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="card">
        <div class="card-header">
            Complete información
        </div>
        <div class="card-body">
            
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="email">Email<i class="text-danger">*</i></label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="Ingrese email..." required>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="password">Password<i class="text-danger">*</i></label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Ingrese password..." required>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="primer_nombre">Primer nombre<i class="text-danger">*</i></label>
                    <input type="text" class="form-control @error('primer_nombre') is-invalid @enderror" id="primer_nombre" name="primer_nombre" value="{{ old('primer_nombre') }}" placeholder="Ingrese primer nombre.." required>
                    @error('primer_nombre')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-md-3">
                    <label for="segundo_nombre">Segundo nombre<i class="text-danger">*</i></label>
                    <input type="text" class="form-control @error('segundo_nombre') is-invalid @enderror" id="segundo_nombre" name="segundo_nombre" value="{{ old('segundo_nombre') }}" placeholder="Ingrese segundo nombre..." required>
                    @error('segundo_nombre')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group col-md-3">
                    <label for="primer_apellido">Primer apellido<i class="text-danger">*</i></label>
                    <input type="text" class="form-control @error('primer_apellido') is-invalid @enderror" id="primer_apellido" name="primer_apellido" value="{{ old('primer_apellido') }}" placeholder="Ingrese primer apellido.." required>
                    @error('primer_apellido')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-md-3">
                    <label for="segundo_apellido">Segundo apellido<i class="text-danger">*</i></label>
                    <input type="text" class="form-control @error('segundo_apellido') is-invalid @enderror" id="segundo_apellido" name="segundo_apellido" value="{{ old('segundo_apellido') }}" placeholder="Ingrese segundo apellido..." required>
                    @error('segundo_apellido')
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
                    <label for="pais">País de procedencia<i class="text-danger">*</i></label>
                    <input type="text" class="form-control @error('pais') is-invalid @enderror" id="pais" name="pais" value="{{ old('pais') }}" required placeholder="Ingrese país...">
                    @error('pais')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-md-3">
                    <label for="provincia">Provincia de procedencia<i class="text-danger">*</i></label>
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
                    <label for="canton">Cantón de procedencia<i class="text-danger">*</i></label>
                    <select id="canton" class="form-control @error('canton') is-invalid @enderror" name="canton" onchange="cargarParroquias(this);" required>
                        
                    </select>
                    @error('canton')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-md-3">
                    <label for="parroquia">Parroquia de procedencia<i class="text-danger">*</i></label>
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

            <div class="form-row">
                
                <div class="form-group col-md-3">
                    <label for="">Tiene discapacidad</label>
                    <div class="form-check form-check-inline ml-2">
                        <input class="form-check-input @error('tiene_discapacidad') is-invalid @enderror" type="radio" name="tiene_discapacidad"  id="tiene_discapacidad1" value="SI" {{ old('tiene_discapacidad')=='SI'?'checked':'checked' }}>
                        <label class="form-check-label" for="tiene_discapacidad1">SI</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="tiene_discapacidad" id="tiene_discapacidad2" value="NO" {{ old('tiene_discapacidad')=='NO'?'checked':'' }}>
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
                    <input type="text" class="form-control @error('porcentaje_discapacidad') is-invalid @enderror" id="porcentaje_discapacidad" name="porcentaje_discapacidad" value="{{ old('porcentaje_discapacidad') }}" placeholder="Ingrese % porcentaje de discapacidad...">
                    @error('porcentaje_discapacidad')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-md-3">
                    <label for="canton">Tiene carnet de conadis</label>
                    <div class="form-check form-check-inline ml-2">
                        <input class="form-check-input @error('tiene_carnet_conadis') is-invalid @enderror" type="radio" name="tiene_carnet_conadis" id="tiene_carnet_conadis1" value="SI" {{ old('tiene_carnet_conadis')=='SI'?'checked':'checked' }}>
                        <label class="form-check-label" for="tiene_carnet_conadis1">SI</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="tiene_carnet_conadis" id="tiene_carnet_conadis2" value="NO" {{ old('tiene_carnet_conadis')=='NO'?'checked':'' }}>
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
                    <input type="text" class="form-control @error('porcentaje_carnet_conadis') is-invalid @enderror" id="porcentaje_carnet_conadis" name="porcentaje_carnet_conadis" placeholder="Ingrese % porcentaje de carnet conadis..." value="{{ old('porcentaje_carnet_conadis') }}">
                    @error('porcentaje_carnet_conadis')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="">Selecionar rol<i class="text-danger">*</i></label>
                @foreach ($roles as $rol)

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="roles[{{ $rol->id }}]"  value="{{ $rol->id }}" {{ old('roles.'.$rol->id)==$rol->id ?'checked':'' }} id="rol_{{ $rol->id }}">
                        <label class="form-check-label" for="rol_{{ $rol->id }}">
                            {{ $rol->name }}
                        </label>
                    </div>
                @endforeach
                
            </div>

            
            <div class="form-group">
                <label for="foto">Seleciona foto</label>
                <input type="file" class="form-control-file @error('foto') is-invalid @enderror" id="foto" name="foto" accept="image/*">
                @error('foto')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
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
    
        
    var provincia=$("#provincia option:selected").val();
    var provincia_laboral=$("#provincia_laboral option:selected").val();
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
                fila+='<option value="'+item.id+'">'+item.canton+'</option>';
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
                fila+='<option value="'+item.id+'">'+item.parroquia+'</option>';
            });
            $('#parroquia').append(fila);
        }).always(function(){
            $.unblockUI();
        }).fail(function(){
            $.notify("Ocurrio un error vuelva intentar.!", "error");
        });
    }

    </script>
    
@endprepend
@endsection
