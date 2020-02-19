@extends('layouts.app',['title'=>'Reportes de pago'])
@section('breadcrumbs', Breadcrumbs::render('cobros'))
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

@push('linksCabeza')
{{--  datatable  --}}
<link rel="stylesheet" type="text/css" href="{{ asset('vendor/DataTables/datatables.min.css') }}"/>
<script type="text/javascript" src="{{ asset('vendor/DataTables/datatables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>

@endpush

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
        if((data.length)>0){
            $('#cohortes').html('');
            $.each(data, function(i, item) {
                fila+='<option value="'+item.id+'">Cohorte '+item.numero+'</option>';
            });
            $('#cohortes').append(fila);
            var cohorte=$("#cohortes option:selected").val();
            obtenerRegistros(cohorte);
        }else{
            $('#cohortes').html('');
            $('#cargarRegistro').html('')
        }
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




    </script>
@endprepend

@endsection
