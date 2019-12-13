@extends('layouts.app',['title'=>'Reportes de pago'])

@section('content')

<div class="card">
    <div class="card-header">
        Reportes de pago
        <div class="form-group">
            <label for="maestria">Selecione una maestría</label>

            @if (count($maestrias)>0)
                <select class="form-control" id="maestria" onchange="cargarCortes(this);">
                    @foreach ($maestrias as $maestria)
                        <option value="{{ $maestria->id }}">{{ $maestria->nombre }}</option>
                        <option value="ss">ok</option>
                    @endforeach
                </select>    
            @else
                <div class="alert alert-dark" role="alert">
                    <strong>No existe maestrías</strong>
                </div>
            @endif
            
        </div>

        <div class="form-group">
            <label for="cohortes">Selecione una cohorte</label>
            <select class="form-control" id="cohortes">
            </select>
        </div>

    </div>
    <div class="card-body">
        <div class="table-responsive" id="cargarRegistro">

        </div>
    </div>
    <div class="card-footer text-muted">
        Footer
    </div>
</div>

@prepend('linksPie')
    <script>
    $('#menuHome').addClass('active');  

    
    
    obtenerCohortes($("#maestria option:selected").val())
    function cargarCortes(arg){
        var id=$(arg).val();
        obtenerCohortes(id)
    }

    function obtenerCohortes(id){
        var fila;
        $.blockUI({message:'<h1>Espere por favor.!</h1>'});
        $.post( "{{ route('obtenerCohosrtesMaestria') }}", { maestria: id })
        .done(function( data ) {
            $('#cohortes').html('');
            $.each(data, function(i, item) {
                fila+='<option value="'+item.id+'">Cohorte '+item.numero+'</option>';
            });
            $('#cohortes').append(fila);

            //cargar cantones
            var cohorte=$("#cohortes option:selected").val();
            
        }).always(function(){
            $.unblockUI();
        }).fail(function(){
            $.notify("Ocurrio un error al intentar cargar los cohortes, vuelva intentar.!", "error");
        });
    }


    

    </script>
@endprepend

@endsection
