@extends('layouts.app',['title'=>'Listado de inscritos en la corte'])

@section('breadcrumbs', Breadcrumbs::render('InscritoCortesMaestria',$corte))


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
                    <th colspan="2">Cortes número: <strong> {{$corte->numero}} </strong>  
                        Estado de la maestría: 
                        <span class="badge badge-light badge-striped badge-striped-right border-right-success">{{$corte->estado}}
                        </span>
                                             
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
    </script>
   
    {!! $dataTable->scripts() !!}
    
@endprepend

@endsection

