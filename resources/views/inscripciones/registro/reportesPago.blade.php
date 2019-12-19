@extends('layouts.app',['title'=>'Reportes de pago'])
@section('breadcrumbs', Breadcrumbs::render('registroReportePagos'))
@section('content')

<div class="card">
    <div class="card-header">
        Reportes de pago
        <div class="form-group">
            <label for="maestria">Selecione una maestría<i class="text-danger">*</i></label>

            @if (count($maestrias)>0)
                <select class="form-control" id="maestria" onchange="cargarCortes(this);">
                    @foreach ($maestrias as $maestria)
                        <option value="{{ $maestria->id }}">{{ $maestria->nombre }}</option>
                    @endforeach
                </select>    
            @else
                <div class="alert alert-dark" role="alert">
                    <strong>No existe maestrías</strong>
                </div>
            @endif
            
        </div>

        <div class="form-group">
            <label for="cohortes">Selecione una cohorte<i class="text-danger">*</i></label>
            <select class="form-control" id="cohortes" onchange="cargarRegistro(this);">
            </select>
        </div>

    </div>
    <div class="card-body">
        <div class="table-responsive" id="cargarRegistro">

        </div>
    </div>
    
</div>

@prepend('linksPie')
    <script>
    
    $('#menuaprobarRegistroMaestrias').addClass('active');
    
    obtenerCohortes($("#maestria option:selected").val())
    function cargarCortes(arg){
        var id=$(arg).val();
        obtenerCohortes(id)
    }

    function obtenerCohortes(id){
        var fila;
        $.blockUI({message:'<h1>Espere por favor.!</h1>'});
        $.post( "{{ route('obtenerCohortesMaestria') }}", { maestria: id })
        .done(function( data ) {
            $('#cohortes').html('');
            $.each(data, function(i, item) {
                fila+='<option value="'+item.id+'">Cohorte '+item.numero+'</option>';
            });
            $('#cohortes').append(fila);

            //cargar cantones
            var cohorte=$("#cohortes option:selected").val();
            obtenerRegistros(cohorte);
        }).always(function(){
            $.unblockUI();
        }).fail(function(){
            $.notify("Ocurrio un error al intentar cargar los cohortes, vuelva intentar.!", "error");
        });
    }

   function cargarRegistro(arg){
        var id=$(arg).val();
        obtenerRegistros(id);

    }



    function obtenerRegistros(cohorte){
        $( "#cargarRegistro" ).load( "{{ route('obtenerRegistroPorCohorte') }}", { "cohorte": cohorte } );
    }
    
 
         

    function verComprobante(arg){
        $('#modalComprobanteRegistro').modal('show');
        $('#comprobanteRegistro').attr('src',$(arg).data('url'));
    }
    $('#modalComprobanteRegistro').on('hidden.bs.modal', function (e) {
        $('#comprobanteRegistro').attr('src','');
    })



    </script>
@endprepend

@endsection
