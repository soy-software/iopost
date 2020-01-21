@extends('layouts.app',['title'=>'Listado de inscritos en la corte'])

@section('breadcrumbs', Breadcrumbs::render('InscritoCortesMaestria',$corte))
@section('barraLateral')

    <div class="breadcrumb justify-content-center">
        <a href="{{ route('nuevoRegistroAspirante',$corte->id) }}" class="breadcrumb-elements-item" data-toggle="tooltip" data-placement="top" title="Nuevo registro de aspirante">
            <i class="fas fa-plus"></i>
                Nuevo Registro
        </a>
        <a href="{{ route('notasExamenAdmision',$corte->id) }}" class="breadcrumb-elements-item" data-toggle="tooltip" data-placement="top" title="Notas de examen de admisión">
            <i class="fas fa-sort-numeric-down-alt"></i>
            Notas Examen
        </a>
    </div>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        Listado de registros
    </div>
    <div class="card-body">
        <div class="table-responsive">
            {!! $dataTable->table()  !!}
        </div>
    </div>
</div>

<div class="modal fade bd-example-modal-lg" id="modalComprobanteRegistro" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Comprobante de pago</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="" id="iframeComprobanteRegistro" allowfullscreen></iframe>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
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
    $('#menuMaestria').addClass('active');

    function verCompropbanteRegistro(arg){
        $('#modalComprobanteRegistro').modal('show');
        $('#iframeComprobanteRegistro').attr('src',$(arg).data('url'));
    }

    $('#modalComprobanteRegistro').on('hidden.bs.modal', function (e) {
        $('#iframeComprobanteRegistro').attr('src','');
      })


      function cambiarEstadoRegistro(arg){
        
        $.blockUI({message:'<h1>Espere por favor.!</h1>'});
        $.post("{{ route('cambiarEstadoInscripcion') }}", { inscripcion: $(arg).data('id'),estado:$(arg).val() })
        .done(function( data ) {
            if(data.success){
                $('#inscritoscorte-table').DataTable().draw(false);
                $.notify(data.success, "success");
            }
            if(data.info){
                $.notify(data.info, "info");   
            }
        }).always(function(){
            $.unblockUI();
        }).fail(function(){
            $.notify("Ocurrio un error, vuelva intentar.", "error");
        });

      }
    </script>
   
    {!! $dataTable->scripts() !!}
    
@endprepend

@endsection

