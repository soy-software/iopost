@extends('layouts.app',['title'=>'Aprobar registro'])

@section('breadcrumbs', Breadcrumbs::render('aprobarRegistroMaestrias'))
@section('barraLateral')

    <div class="breadcrumb justify-content-center">
        <a href="{{ route('registroReportePagos') }}" class="breadcrumb-elements-item">
            <i class="fas fa-file-pdf"></i>
            Reportes
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
                <h5 class="modal-title">Comprobante de registro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
            <div class="modal-body">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="" id="comprobanteRegistro" allowfullscreen></iframe>
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
        $('#menuaprobarRegistroMaestrias').addClass('active');  

        function verComprobante(arg){
            $('#modalComprobanteRegistro').modal('show');
            $('#comprobanteRegistro').attr('src',$(arg).data('url'));
        }
        $('#modalComprobanteRegistro').on('hidden.bs.modal', function (e) {
            $('#comprobanteRegistro').attr('src','');
        })

        
        function aprobarRegistro(arg){
            $.confirm({
                title: 'Ingrese número de factura',
                theme: 'modern',
				type:'dark',
                icon:'fas fa-file-invoice-dollar',
				closeIcon:true,
                content: 'Aspirante: '+ $(arg).data('aspirante')+
                '<input type="text" placeholder="Ingrese..." id="numeroFactura" name="numeroFactura" class="form-control" required />',
                buttons: {
                    formSubmit: {
                        text: 'Aprobar registro',
                        btnClass: 'btn-blue',
                        action: function () {
                            var factura = this.$content.find('#numeroFactura').val();
                            if(!factura){
                                $.alert('Ingrese número de factura por favor');
                                return false;
                            }
                            
                            $.blockUI({message:'<h1>Espere por favor.!</h1>'});
                            $.post("{{ route('aprobarRegistroFactura') }}", { inscripcion: $(arg).data('id'),factura:factura })
                            .done(function( data ) {
                                if(data.success){
                                    $('#inscripciones-registrosaprobar-table').DataTable().draw(false);
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
                    },
                    cancelar: function () {
                        //close
                    },
                }
            });
        }

    </script>
    {!! $dataTable->scripts() !!}
@endprepend
@endsection
