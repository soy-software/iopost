@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        Inscribir en: <strong>{{ $corte->maestria->nombre }}</strong>
    </div>
    <div class="card-body">
        <form id="example-form" action="#">
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
                    <label for="name">First name *</label>
                    <input id="name" name="name" type="text" class="required">
                    <label for="surname">Last name *</label>
                    <input id="surname" name="surname" type="text" class="required">
                    <label for="email">Email *</label>
                    <input id="email" name="email" type="text" class="required email">
                    <label for="address">Address</label>
                    <input id="address" name="address" type="text">
                    <p>(*) Mandatory</p>
                </section>
                <h3>Registros académicos</h3>
                <section>
                    <ul>
                        <li>Foo</li>
                        <li>Bar</li>
                        <li>Foobar</li>
                    </ul>
                </section>
                <h3>Finalizar</h3>
                <section>
                    <input id="acceptTerms" name="acceptTerms" type="checkbox" class="required"> <label for="acceptTerms">I agree with the Terms and Conditions.</label>
                </section>
            </div>
        </form>
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
                alert("Submitted!");
            }
        });


        //obtener cantones por provincia
        var provincia=$("#provincia option:first").val();
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
                var canton=$("#canton option:first").val();
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
