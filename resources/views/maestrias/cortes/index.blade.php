@extends('layouts.app',['title'=>'Listado de cohortes'])

@section('breadcrumbs', Breadcrumbs::render('cortesMaestria',$maestria))

@section('barraLateral')

    <div class="breadcrumb justify-content-center">
       
        <a href="{{ route('nuevoCohorte',$maestria->id) }}" class="breadcrumb-elements-item">
            <i class="fas fa-plus"></i>
            Nueva cohorte
        </a>
    </div>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        Cortes de {{ $maestria->nombre }}
    </div>
    <div class="card-body">
        <div class="table-responsive">
            {!! $dataTable->table()  !!}
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
        
    // programacion  para el cambio de estado
      function estadoCorte(arg) {
            var url='{{route("cortesMaestria",$maestria->id)}}';
			var msg=$(arg).data('title');
			$.confirm({
				title: 'Confirme!',
				content: msg,
				theme: 'modern',
				type:'dark',
				icon:'fas fa-smile-beam',
				closeIcon:true,
				buttons: {
					confirmar: function () {
                        $.blockUI({message:'<h1>Espere por favor.!</h1>'});
                        $.post( "{{ route('cambiarEstadoCorte') }}", { corte: $(arg).data('id'),valor:$(arg).val() })
                        .done(function( data ) {
                            if(data.success){
                                $('#cortes-table').DataTable().draw(false);
                                $.notify(data.success, "success");
                            }
                            if(data.info){
                                $.notify(data.info, "info");
                            }
                            
                        }).always(function(){
                            $.unblockUI();
                        }).fail(function(error){
                            $.notify("Ocurrio un error, vuelva intentar", "error");
                        });
                           					
					}
				}
			});
      }
    </script>
    {!! $dataTable->scripts() !!}
    
@endprepend

@endsection

