@extends('layouts.app',['title'=>'Listado de maestrias'])

@section('breadcrumbs', Breadcrumbs::render('cortesMaestria',$maestria))


@section('content')
<div class="card">
    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th colspan="2">Cortes de: <strong> {{$maestria->nombre}} </strong>  
                        Estado de la maestría: 
                        <span class="badge badge-light badge-striped badge-striped-right border-right-{{$maestria->estado=='Activo'?'success':'danger'}}">{{$maestria->estado=='Activo'?'Activo':'Inactivo'}}
                        </span>
                      
                        @can('crearCortesMaestria',$maestria)
                            
                        <div class="float-right">
                            <button onclick="cerarCorte(this)"  data-id="{{$maestria->id}}" class="btn btn-default border-dark" data-title="Crear nueva corte de {{$maestria->nombre}}"><i class="icon-plus3"></i></button>                           
                        </div>                            
                        @endcan
                       
                    </th>                                    
                    
                </tr>
            </thead>            
        </table>
        <div class="table-responsive mt-2">
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


    	function cerarCorte(arg){
			var url='{{route("cortesMaestria",$maestria->id)}}';
			var msg=$(arg).data('title');
			$.confirm({
				title: 'Confirme!',
				content: msg,
				theme: 'modern',
				type:'dark',
				icon:'far fa-sad-cry',
				closeIcon:true,
				buttons: {
					confirmar: function () {
                        $.blockUI({message:'<h1>Espere por favor.!</h1>'});
                        $.post( "{{ route('guardarCortes') }}", { maestria: $(arg).data('id') })
                        .done(function( data ) {
                        location.replace(url);
                        console.log(data)
                        }).always(function(){
                            $.unblockUI();
                        }).fail(function(error){
                            console.log(error);
                        });
                           					
					}
				}
			});
		} 
    </script>
    {!! $dataTable->scripts() !!}
    
@endprepend

@endsection

